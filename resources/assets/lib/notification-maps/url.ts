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

import LegacyPmNotification from 'models/legacy-pm-notification';
import Notification from 'models/notification';

export function urlGroup(item: Notification) {
  if (item.name === 'comment_new') {
    switch (item.objectType) {
      case 'beatmapset':
        return laroute.route('beatmapsets.show', { beatmapset: item.objectId });
      case 'build':
        return laroute.route('changelog.show', { changelog: item.objectId, key: 'id' });
      case 'news_post':
        return laroute.route('news.show', { news: item.objectId, key: 'id' });
    }
  }

  switch (item.objectType) {
    case 'beatmapset':
      return laroute.route('beatmapsets.discussion', { beatmapset: item.objectId });
    case 'channel':
      return laroute.route('chat.index', { sendto: item.sourceUserId });
    case 'forum_topic':
      return laroute.route('forum.topics.show', { topic: item.objectId, start: 'unread' });
  }
}

export function urlSingular(item: Notification) {
  if (item instanceof LegacyPmNotification) {
    return '/forum/ucp.php?i=pm&folder=inbox';
  }

  switch (item.name) {
    case 'beatmapset_discussion_lock':
    case 'beatmapset_discussion_unlock':
    case 'beatmapset_disqualify':
    case 'beatmapset_love':
    case 'beatmapset_nominate':
    case 'beatmapset_qualify':
    case 'beatmapset_reset_nominations':
      return laroute.route('beatmapsets.discussion', { beatmapset: item.objectId });
    case 'beatmapset_discussion_post_new':
      return BeatmapDiscussionHelper.url({
        beatmapId: item.details.beatmapId,
        beatmapsetId: item.objectId,
        discussionId: item.details.discussionId,
      });
    case 'beatmapset_rank':
      return laroute.route('beatmapsets.show', { beatmapset: item.objectId });
    case 'channel_message':
      return laroute.route('chat.index', { sendto: item.sourceUserId });
    case 'comment_new':
      return laroute.route('comments.show', { comment: item.details.commentId });
    case 'forum_topic_reply':
      return laroute.route('forum.posts.show', { post: item.details.postId });
    case 'user_achievement_unlock':
      return `${laroute.route('users.show', { user: item.details.userId })}#medals`;
  }
}
