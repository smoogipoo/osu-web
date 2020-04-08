// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import { NotificationTypeJson } from 'interfaces/notification-json';
import { action, computed, observable } from 'mobx';
import NotificationStack from 'models/notification-stack';
import { NotificationContextData } from 'notifications-context';
import { NotificationCursor } from 'notifications/notification-cursor';
import { NotificationIdentity } from 'notifications/notification-identity';
import NotificationReadable from 'notifications/notification-readable';
import { NotificationResolver } from 'notifications/notification-resolver';

export type Name = null | 'beatmapset' | 'build' | 'channel' | 'forum_topic' | 'news_post' | 'user';
const names: Name[] = [null, 'beatmapset', 'build', 'channel', 'forum_topic', 'news_post', 'user'];

export const TYPES = [
  { type: null },
  { type: 'user' },
  { type: 'beatmapset' },
  { type: 'forum_topic' },
  { type: 'news_post' },
  { type: 'build' },
  { type: 'channel' },
];

export function getValidName(value: unknown) {
  const casted = value as Name;
  if (names.indexOf(casted) > -1) {
    return casted;
  }

  return names[0];
}

export default class NotificationType implements NotificationReadable {
  @observable cursor?: NotificationCursor | null;
  @observable isLoading = false;
  @observable isMarkingAsRead = false;
  @observable stacks = new Map<string, NotificationStack>();
  @observable total = 0;

  @computed get isEmpty() {
    return this.total <= 0;
  }

  @computed get hasVisibleNotifications() {
    return (this.total > 0 && this.stacks.size > 0) || this.name === 'legacy_pm';
  }

  @computed get hasMore() {
    // undefined means not loaded yet.
    return this.cursor !== null && this.stackNotificationCount < this.total;
  }

  get identity(): NotificationIdentity {
    return {
      objectType: this.name,
    };
  }

  @computed get stackNotificationCount() {
    return [...this.stacks.values()].reduce((acc, stack) => {
      return acc + stack.total;
    }, 0);
  }

  constructor(readonly name: string | null, readonly resolver: NotificationResolver) {}

  static fromJson(json: NotificationTypeJson, resolver: NotificationResolver) {
    const obj = new NotificationType(json.name, resolver);
    obj.updateWithJson(json);
    return obj;
  }

  @action
  loadMore(context: NotificationContextData) {
    if (this.cursor === null) { return; }

    this.isLoading = true;

    this.resolver.loadMore(this.identity, context, this.cursor)
    .always(action(() => {
      this.isLoading = false;
    }));
  }

  @action
  markTypeAsRead() {
    this.resolver.queueMarkAsRead(this);
  }

  @action
  removeStack(stack: NotificationStack) {
    const exists = this.stacks.delete(stack.id);
    if (exists) this.total -= stack.total;
    return exists;
  }

  @action
  updateWithJson(json: NotificationTypeJson) {
    this.cursor = json.cursor;
    this.total = json.total;
  }
}
