// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import { FlagCountry } from 'flag-country';
import { FriendButton } from 'friend-button';
import UserJSON from 'interfaces/user-json';
import { route } from 'laroute';
import * as React from 'react';
import { SupporterIcon } from 'supporter-icon';
import UserGroupBadge from 'user-group-badge';

export default function User({ user, modifiers = [] }: { modifiers?: string[], user: UserJSON }) {
  const url = route('users.show', { user: user.id });

  return (
    <div className={`${osu.classWithModifiers('user-search-card', modifiers)} clickable-row`}>
      <a className='user-search-card__avatar-container' href={url}>
        <div className='avatar avatar--full' style={{ backgroundImage: osu.urlPresence(user.avatar_url) }} />
      </a>

      <div className='user-search-card__details'>
        <div className='user-search-card__col  user-search-card__col--flag'>
          <FlagCountry country={user.country} modifiers={['inline']} />
        </div>

        <a className='user-search-card__col user-search-card__col--username clickable-row-link' href={url}>
          {user.username}
        </a>

        {user.is_supporter
          ? (
            <div className='user-search-card__col user-search-card__col--icon'>
              <SupporterIcon level={user.support_level} modifiers={['quick-search']} />
            </div>
          ) : null}

        {user.group_badge != null && (
          <div className='user-search-card__col user-search-card__col--icon'>
            <UserGroupBadge badge={user.group_badge} />
          </div>
        )}

        <div className='user-search-card__col user-search-card__col--icon'>
          <FriendButton userId={user.id} modifiers={['quick-search']} />
        </div>
      </div>
    </div>
  );
}
