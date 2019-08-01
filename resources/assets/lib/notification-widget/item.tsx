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

import { observer } from 'mobx-react';
import Notification from 'models/notification';
import * as React from 'react';
import { Spinner } from 'spinner';
import { WithMarkReadProps } from './with-mark-read';

interface Props extends WithMarkReadProps {
  expandButton?: React.ReactNode;
  icons?: string[];
  item: Notification;
  message: string;
  modifiers: string[];
  url: string;
  withCategory: boolean;
  withCoverImage: boolean;
}

export default observer(class Item extends React.Component<Props> {
  render() {
    return (
      <div className={this.blockClass()} onClick={this.props.markReadFallback}>
        {this.renderCover()}
        <div className='notification-popup-item__main'>
          <div className='notification-popup-item__content'>
            {this.renderCategory()}
            {this.renderMessage()}
            {this.renderTime()}
            {this.renderExpandButton()}
          </div>
          <div className='notification-popup-item__side-buttons'>
            {this.renderMarkAsReadButton()}
          </div>
        </div>
      </div>
    );
  }

  private blockClass() {
    return `clickable-row ${osu.classWithModifiers('notification-popup-item', [...this.props.modifiers, this.props.item.category])}`;
  }

  private renderCategory() {
    if (!this.props.withCategory) {
      return null;
    }

    const label = osu.trans(`notifications.item.${this.props.item.displayType}.${this.props.item.category}._`);

    if (label === '') {
      return null;
    }

    return <div className='notification-popup-item__row notification-popup-item__row--category'>{label}</div>;
  }

  private renderCover() {
    const coverUrl = this.props.withCoverImage ? this.props.item.details.coverUrl : null;

    return (
      <div
        className='notification-popup-item__cover'
        style={{
          backgroundImage: osu.urlPresence(coverUrl),
        }}
      >
        <div className='notification-popup-item__cover-overlay'>
          {this.renderCoverIcons()}
        </div>
      </div>
    );
  }

  private renderCoverIcons() {
    if (this.props.icons == null) {
      return null;
    }

    return this.props.icons.map((icon) => {
      return (
        <div key={icon} className='notification-popup-item__cover-icon'>
          <span className={icon} />
        </div>
      );
    });
  }

  private renderExpandButton() {
    if (this.props.expandButton == null) {
      return null;
    }

    return <div className='notification-popup-item__row'>{this.props.expandButton}</div>;
  }

  private renderMarkAsReadButton() {
    if (!this.props.canMarkRead) {
      return null;
    }

    if (this.props.markingAsRead) {
      return (
        <div className='notification-popup-item__read-button'>
          <Spinner />
        </div>
      );
    } else {
      return (
        <button
          type='button'
          className='notification-popup-item__read-button'
          onClick={this.props.markRead}
        >
          <span className='fas fa-times' />
        </button>
      );
    }
  }

  private renderMessage() {
    return (
      <a
        onClick={this.props.markRead}
        href={this.props.url}
        className='notification-popup-item__row notification-popup-item__row--message clickable-row-link'
      >
        {this.props.message}
      </a>
    );
  }

  private renderTime() {
    if (this.props.item.createdAtJson == null) {
      return;
    }

    return (
      <div
        className='notification-popup-item__row notification-popup-item__row--time'
        dangerouslySetInnerHTML={{
          __html: osu.timeago(this.props.item.createdAtJson),
        }}
      />
    );
  }
});
