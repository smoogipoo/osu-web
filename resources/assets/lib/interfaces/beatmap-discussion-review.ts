// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

export interface DocumentBlock {
  text: string;
  type: 'paragraph' | 'embed';
}

export interface DocumentParagraph extends DocumentBlock {
  type: 'paragraph';
}

export interface DocumentIssueEmbed extends DocumentBlock {
  beatmap_id: number | null;
  discussion_id?: number;
  discussion_type: 'praise' | 'problem' | 'suggestion';
  timestamp: string;
  type: 'embed';
}

export type BeatmapReviewBlock = DocumentIssueEmbed | DocumentParagraph;
export type BeatmapDiscussionReview = BeatmapReviewBlock[];
