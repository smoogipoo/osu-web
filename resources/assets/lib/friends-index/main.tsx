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

import HeaderV3 from 'header-v3';
import * as React from 'react';
import { UserList } from 'user-list';

interface Props {
  friends: User[];
  user: User;
}

export class Main extends React.PureComponent<Props> {
  static defaultProps = {
    user: currentUser,
  };

  static readonly links = [
    { title: osu.trans('home.user.title'), url: laroute.route('home') },
    { title: osu.trans('friends.title_compact'), url: laroute.route('friends.index'), active: true },
    { title: osu.trans('forum.topic_watches.index.title_compact'), url: laroute.route('forum.topic-watches.index') },
    { title: osu.trans('beatmapset_watches.index.title_compact'), url: laroute.route('beatmapsets.watches.index') },
    { title: osu.trans('accounts.edit.title_compact'), url: laroute.route('account.edit') },
  ];

  render() {
    return (
      <div className='osu-layout osu-layout--full'>
        <HeaderV3
          backgroundImage={this.props.user.cover.url}
          links={Main.links}
          theme='users'
          titleTrans={{
            info: osu.trans('friends.index.title.info'),
            key: 'friends.index.title._',
          }}
        />

        <div className='osu-page osu-page--users'>
          <UserList users={this.props.friends} />
        </div>
      </div>
    );
  }
}
