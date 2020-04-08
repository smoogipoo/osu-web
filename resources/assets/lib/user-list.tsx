// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import UserJSON from 'interfaces/user-json';
import { route } from 'laroute';
import * as moment from 'moment';
import * as React from 'react';
import { Sort } from 'sort';
import { ViewMode } from 'user-card';
import { UserCards } from 'user-cards';

type Filter = 'all' | 'online' | 'offline';
type SortMode = 'last_visit' | 'rank' | 'username';

const filters: Filter[] = ['all', 'online', 'offline'];
const sortModes: SortMode[] = ['last_visit', 'rank', 'username'];
const viewModes: ViewMode[] = ['card', 'list', 'brick'];

interface Props {
  title?: string;
  users: UserJSON[];
}

interface State {
  filter: Filter;
  sortMode: SortMode;
  viewMode: ViewMode;
}

function rankSortDescending(x: UserJSON, y: UserJSON) {
  if (x.current_mode_rank != null && y.current_mode_rank != null) {
    return x.current_mode_rank > y.current_mode_rank ? 1 : -1;
  } else if (x.current_mode_rank === null) {
    return 1;
  } else {
    return -1;
  }
}

function usernameSortAscending(x: UserJSON, y: UserJSON) {
  return x.username.localeCompare(y.username);
}

export class UserList extends React.PureComponent<Props> {
  readonly state: State = {
    filter: this.filterFromUrl,
    sortMode: this.sortFromUrl,
    viewMode: this.viewFromUrl,
  };

  private get filterFromUrl() {
    const url = new URL(location.href);

    return this.getAllowedQueryStringValue(
      filters,
      url.searchParams.get('filter'),
      currentUser?.user_preferences?.user_list_filter,
    );
  }

  private get sortedUsers() {
    const users = this.getFilteredUsers(this.state.filter).slice();

    switch (this.state.sortMode) {
      case 'rank':
        return users.sort(rankSortDescending);

      case 'username':
        return users.sort(usernameSortAscending);

      default:
        return users.sort((x, y) => {
          if (x.is_online && y.is_online) {
            return usernameSortAscending(x, y);
          }

          if (x.is_online || y.is_online) {
            return x.is_online ? -1 : 1;
          }

          return moment(y.last_visit || 0).diff(moment(x.last_visit || 0));
        });
    }
  }

  private get sortFromUrl() {
    const url = new URL(location.href);

    return this.getAllowedQueryStringValue(
      sortModes,
      url.searchParams.get('sort'),
      currentUser?.user_preferences?.user_list_sort,
    );
  }

  private get viewFromUrl() {
    const url = new URL(location.href);

    return this.getAllowedQueryStringValue(
      viewModes,
      url.searchParams.get('view'),
      currentUser?.user_preferences?.user_list_view,
    );
  }

  onSortSelected = (event: React.SyntheticEvent) => {
    const value = (event.currentTarget as HTMLElement).dataset.value;
    const url = osu.updateQueryString(null, { sort: value });

    Turbolinks.controller.advanceHistory(url);
    this.setState({ sortMode: value }, this.saveOptions);
  }

  onViewSelected = (event: React.SyntheticEvent) => {
    const value = (event.currentTarget as HTMLElement).dataset.value;
    const url = osu.updateQueryString(null, { view: value });

    Turbolinks.controller.advanceHistory(url);
    this.setState({ viewMode: value }, this.saveOptions);
  }

  optionSelected = (event: React.SyntheticEvent) => {
    event.preventDefault();
    const key = (event.currentTarget as HTMLElement).dataset.key;
    const url = osu.updateQueryString(null, { filter: key });

    Turbolinks.controller.advanceHistory(url);
    this.setState({ filter: key }, this.saveOptions);
  }

  render(): React.ReactNode {
    return (
      <>
        {this.renderSelections()}

        <div className='user-list'>
          {this.props.title != null && (
            <h1 className='user-list__title'>{this.props.title}</h1>
          )}

          <div className='user-list__toolbar'>
            <div className='user-list__toolbar-item'>{this.renderSorter()}</div>
            <div className='user-list__toolbar-item'>{this.renderViewMode()}</div>
          </div>

          <div className='user-list__items'>
            <UserCards users={this.sortedUsers} viewMode={this.state.viewMode} />
          </div>
        </div>
      </>
    );
  }

  renderOption(key: string, text: string | number, active = false) {
    // FIXME: change all the names
    const modifiers = active ? ['active'] : [];
    let className = osu.classWithModifiers('update-streams-v2__item', modifiers);
    className += ` t-changelog-stream--${key}`;

    return (
      <a
        className={className}
        data-key={key}
        href={osu.updateQueryString(null, { filter: key })}
        key={key}
        onClick={this.optionSelected}
      >
        <div className='update-streams-v2__bar u-changelog-stream--bg' />
        <p className='update-streams-v2__row update-streams-v2__row--name'>{osu.trans(`users.status.${key}`)}</p>
        <p className='update-streams-v2__row update-streams-v2__row--version'>{text}</p>
      </a>
    );
  }

  renderSelections() {
    return (
      <div className='update-streams-v2 update-streams-v2--with-active update-streams-v2--user-list'>
        <div className='update-streams-v2__container'>
          {
            filters.map((filter) => {
              return this.renderOption(filter, this.getFilteredUsers(filter).length, filter === this.state.filter);
            })
          }
        </div>
      </div>
    );
  }

  renderSorter() {
    return (
      <Sort
        modifiers={['user-list']}
        onSortSelected={this.onSortSelected}
        sortMode={this.state.sortMode}
        values={sortModes}
      />
    );
  }

  renderViewMode() {
    return (
      <div className='user-list__view-modes'>
        <button
          className={osu.classWithModifiers('user-list__view-mode', this.state.viewMode === 'card' ? ['active'] : [])}
          data-value='card'
          title={osu.trans('users.view_mode.card')}
          onClick={this.onViewSelected}
        >
          <span className='fas fa-square' />
        </button>
        <button
          className={osu.classWithModifiers('user-list__view-mode', this.state.viewMode === 'list' ? ['active'] : [])}
          data-value='list'
          title={osu.trans('users.view_mode.list')}
          onClick={this.onViewSelected}
        >
          <span className='fas fa-bars' />
        </button>
        <button
          className={osu.classWithModifiers('user-list__view-mode', this.state.viewMode === 'brick' ? ['active'] : [])}
          data-value='brick'
          title={osu.trans('users.view_mode.brick')}
          onClick={this.onViewSelected}
        >
          <span className='fas fa-th' />
        </button>
      </div>
    );
  }

  private getAllowedQueryStringValue<T>(allowed: T[], value: unknown, fallback: unknown) {
    const casted = value as T;
    if (allowed.indexOf(casted) > -1) {
      return casted;
    }

    const fallbackCasted = fallback as T;
    if (allowed.indexOf(fallbackCasted) > -1) {
      return fallbackCasted;
    }

    return allowed[0];
  }

  private getFilteredUsers(filter: Filter) {
    // TODO: should be cached or something
    switch (filter) {
      case 'online':
        return this.props.users.filter((user) => user.is_online);
      case 'offline':
        return this.props.users.filter((user) => !user.is_online);
      default:
        return this.props.users;
    }
  }

  private saveOptions() {
    if (currentUser.id == null) {
      return;
    }

    $.ajax(route('account.options'), {
      dataType: 'JSON',
      method: 'PUT',

      data: { user_profile_customization: {
        user_list_filter: this.state.filter,
        user_list_sort: this.state.sortMode,
        user_list_view: this.state.viewMode,
      } },
    }).done((user: UserJSON) => $.publish('user:update', user));
  }
}
