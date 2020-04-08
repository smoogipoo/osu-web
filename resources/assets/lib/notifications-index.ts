// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import { dispatch } from 'app-dispatcher';
import { NotificationBundleJson } from 'interfaces/notification-json';
import { Main } from 'notifications-index/main';
import { NotificationEventMoreLoaded } from 'notifications/notification-events';

reactTurbolinks.registerPersistent('notifications-index', Main, true, (container: HTMLElement) => {
  const bundle = osu.parseJson('json-notifications') as NotificationBundleJson;
  dispatch(new NotificationEventMoreLoaded(bundle, { isWidget: false }));

  return {};
});
