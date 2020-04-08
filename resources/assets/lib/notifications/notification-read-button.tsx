// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import { observer } from 'mobx-react';
import * as React from 'react';
import { Spinner } from 'spinner';

interface Props {
  isMarkingAsRead: boolean;
  modifiers: string[];
  onMarkAsRead?: () => void;
  text?: string;
}

@observer
export default class NotificationReadButton extends React.Component<Props> {
  static defaultProps = {
    modifiers: [],
  };

  render() {
    if (this.props.isMarkingAsRead) {
      return (
        <div className={osu.classWithModifiers('notification-read-button', this.props.modifiers)}>
          <span className='notification-read-button__text'>{this.props.text}</span>
          <div className='notification-read-button__icon'>
            <Spinner />
          </div>
        </div>
      );
    } else {
      return (
        <button
          type='button'
          className={osu.classWithModifiers('notification-read-button', this.props.modifiers)}
          onClick={this.props.onMarkAsRead}
        >
          <span className='notification-read-button__text'>{this.props.text}</span>
          <div className='notification-read-button__icon'>
            <span className='fas fa-times' />
          </div>
        </button>
      );
    }
  }
}
