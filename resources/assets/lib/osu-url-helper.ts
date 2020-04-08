// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import * as laroute from 'laroute';
import * as _ from 'lodash';

export default class OsuUrlHelper {
  private static internalUrls = [
    'admin',
    'api/v2',
    'beatmaps',
    'beatmapsets',
    'client-verifications',
    'comments',
    'community',
    'help',
    'home',
    'legal',
    'oauth',
    'rankings',
    'session',
    'store',
    'users',
  ].join('|');

  static beatmapDownloadDirect(id: string | number): string {
    return `osu://b/${id}`;
  }

  static changelogBuild(build: ChangelogBuild): string {
    return laroute.route('changelog.build', {stream: build.update_stream.name, build: build.version});
  }

  static isHTML(location: TurbolinksLocation): boolean {
    // Some changelog builds have `.` in their version, failing turbolinks' check.
    return location.isHTML() || _.startsWith(location.getPath(), '/home/changelog/');
  }

  static isInternal(location: TurbolinksLocation): boolean {
    return RegExp(`^/(?:${this.internalUrls})(?:$|/|#)`).test(location.getPath());
  }

  // external link
  static openBeatmapEditor(timestampWithRange: string): string {
    return `osu://edit/${timestampWithRange}`;
  }
}
