/**
 *    Copyright (c) ppy Pty Ltd <contact@ppy.sh>.
 *
 *    This file is part of osu!web. osu!web is distributed with the hope of
 *    attracting more community contributions to the core ecosystem of osu!.
 *
 *    osu!web is free software: you can redistribute it and/or modify
 *    it under the terms of the Affero GNU General Public License version 3
 *    as published by the Free Software Foundation.
 *
 *    osu!web is distributed WITHOUT ANY WARRANTY; without even the implied
 *    warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *    See the GNU Affero General Public License for more details.
 *
 *    You should have received a copy of the GNU Affero General Public License
 *    along with osu!web.  If not, see <http://www.gnu.org/licenses/>.
 */

import {ChatChannelSwitchAction, ChatMessageAddAction, ChatMessageSendAction, ChatMessageUpdateAction} from 'actions/chat-actions';
import DispatcherAction from 'actions/dispatcher-action';
import { WindowBlurAction, WindowFocusAction } from 'actions/window-focus-actions';
import DispatchListener from 'dispatch-listener';
import Dispatcher from 'dispatcher';
import { transaction } from 'mobx';
import Message from 'models/chat/message';
import RootDataStore from 'stores/root-data-store';
import ChatAPI from './chat-api';
import { MessageJSON } from './chat-api-responses';

export default class ChatWorker implements DispatchListener {
  private dispatcher: Dispatcher;
  private rootDataStore: RootDataStore;

  private pollingEnabled: boolean = true;
  private pollTime: number = 1000;
  private pollTimeIdle: number = 5000;
  private windowIsActive: boolean = true;

  private updateTimerId?: number;

  private api: ChatAPI;

  private updateXHR: boolean = false;

  constructor(dispatcher: Dispatcher, rootDataStore: RootDataStore) {
    this.dispatcher = dispatcher;
    this.rootDataStore = rootDataStore;
    this.dispatcher.register(this);
    this.api = new ChatAPI();

    this.startPolling();
  }

  handleDispatchAction(action: DispatcherAction) {
    if (action instanceof ChatMessageSendAction) {
      this.sendMessage(action.message);
    } else if (action instanceof WindowFocusAction) {
      this.windowIsActive = true;
    } else if (action instanceof WindowBlurAction) {
      this.windowIsActive = false;
    }
  }

  sendMessage(message: Message) {
    const channelId = message.channelId;
    const channel = this.rootDataStore.channelStore.getOrCreate(channelId);

    if (channel.newChannel) {
      const users = channel.users.slice();
      const userId = users.find((user) => {
        return user !== currentUser.id;
      });

      if (!userId) {
        console.debug('sendMessage:: userId not found?? this shouldn\'t happen');
        return;
      }

      this.api.newConversation(userId, message.content)
        .then((response) => {
          const newId = response.new_channel_id;
          transaction(() => {
            this.rootDataStore.channelStore.channels.delete(channelId);
            this.rootDataStore.channelStore.updatePresence(response.presence);
            this.dispatcher.dispatch(new ChatChannelSwitchAction(newId));
          });
        })
        .catch(() => {
          message.errored = true;
          this.dispatcher.dispatch(new ChatMessageUpdateAction(message));
        });
    } else {
      this.api.sendMessage(channelId, message.content)
        .then((updateJson) => {
          if (updateJson) {
            message.messageId = updateJson.message_id;
          } else {
            message.errored = true;
          }
          this.dispatcher.dispatch(new ChatMessageUpdateAction(message));
        })
        .catch(() => {
          message.errored = true;
          this.dispatcher.dispatch(new ChatMessageUpdateAction(message));
        });
    }
  }

  pollForUpdates = () => {
    if (this.updateXHR) {
      return;
    }
    this.updateXHR = true;

    this.api.getUpdates(this.rootDataStore.channelStore.maxMessageId)
      .then((updateJson) => {
        this.updateXHR = false;
        if (this.pollingEnabled) {
          this.updateTimerId = Timeout.set(this.pollingTime(), this.pollForUpdates);
        }

        if (!updateJson) {
          return;
        }

        transaction(() => {
          updateJson.messages.forEach((message: MessageJSON) => {
            const newMessage = Message.fromJSON(message);
            newMessage.sender = this.rootDataStore.userStore.getOrCreate(message.sender_id, message.sender);
            this.dispatcher.dispatch(new ChatMessageAddAction(newMessage));
          });

          this.rootDataStore.channelStore.updatePresence(updateJson.presence);
        });
      })
      .catch((err) => {
        // silently ignore errors and continue polling
        this.updateXHR = false;
        if (this.pollingEnabled) {
          this.updateTimerId = Timeout.set(this.pollingTime(), this.pollForUpdates);
        }
      });
  }

  startPolling() {
    if (!this.updateTimerId) {
      this.updateTimerId = Timeout.set(this.pollingTime(), this.pollForUpdates);
    }
  }

  pollingTime(): number {
    return this.windowIsActive ? this.pollTime : this.pollTimeIdle;
  }

  stopPolling() {
    if (this.updateTimerId) {
      Timeout.clear(this.updateTimerId);
      this.updateTimerId = undefined;
      this.updateXHR = false;
    }
  }
}
