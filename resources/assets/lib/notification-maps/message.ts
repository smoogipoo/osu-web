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

export function messageCompact(item: Notification) {
  let message: string;

  const replacements = {
    content: item.details.content,
    title: item.details.title,
    username: item.details.username,
  };

  let key = `notifications.item.${item.displayType}.${item.category}`;
  if (item.objectType === 'channel') {
    key += `.${item.details.type}`;
  }
  key += `.${item.name}_compact`;

  if (item instanceof LegacyPmNotification) {
    message = osu.transChoice(key, item.details.count, replacements);
  } else {
    message = osu.trans(key, replacements);
  }

  return message;
}

export function messageGroup(item: Notification) {
  if (item.objectType === 'channel') {
    const replacements = {
      title: item.details.title,
      username: item.details.username,
    };

    const key = `notifications.item.${item.objectType}.${item.category}.${item.details.type}.${item.name}_group`;

    return osu.trans(key, replacements);
  }

  return item.details.title;
}

export function messageSingular(item: Notification) {
  let message: string;

  const replacements = {
    content: item.details.content,
    title: item.details.title,
    username: item.details.username,
  };

  let key = `notifications.item.${item.displayType}.${item.category}`;
  if (item.objectType === 'channel') {
    key += `.${item.details.type}`;
  }
  key += `.${item.name}`;

  if (item instanceof LegacyPmNotification) {
    message = osu.transChoice(key, item.details.count, replacements);
  } else {
    message = osu.trans(key, replacements);
  }

  return message;
}
