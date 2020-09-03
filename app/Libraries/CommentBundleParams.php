<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

namespace App\Libraries;

use App\Models\Comment;

class CommentBundleParams
{
    const DEFAULT_PAGE = 1;
    const DEFAULT_LIMIT = 50;

    public $commentableId;
    public $commentableType;
    public $parentId;
    public $cursor;
    public $cursorRaw;
    public $cursorHelper;
    public $limit;
    public $page;
    public $sort;

    public function __construct($params, $user)
    {
        $this->parentId = null;
        $this->cursor = null;
        $this->limit = static::DEFAULT_LIMIT;
        $this->page = static::DEFAULT_PAGE;
        $this->sort = optional($user)->profileCustomization()->comments_sort ?? null;

        $this->setAll($params);
    }

    public function setAll($params)
    {
        if (array_key_exists('parent_id', $params)) {
            $this->parentId = get_int($params['parent_id']);
        }

        if (array_key_exists('limit', $params)) {
            $this->limit = clamp(get_int($params['limit']), 1, 100);
        }

        if (array_key_exists('page', $params)) {
            $this->page = max(get_int($params['page']), 1);
        }

        $this->commentableId = $params['commentable_id'] ?? null;
        $this->commentableType = $params['commentable_type'] ?? null;

        $this->cursorHelper = new DbCursorHelper(Comment::SORTS, Comment::DEFAULT_SORT, $params['sort'] ?? $this->sort);
        $this->cursorRaw = $params['cursor'] ?? null;
        $this->cursor = $this->cursorHelper->prepare($this->cursorRaw);
        $this->sort = $this->cursorHelper->getSortName();
    }

    public function filterByParentId()
    {
        return $this->parentId !== null;
    }

    public function forUrl()
    {
        $params = [
            'commentable_id' => $this->commentableId,
            'commentable_type' => $this->commentableType,
            'cursor' => $this->cursor === null ? null : $this->cursorRaw,
        ];

        if ($this->parentId !== null) {
            $params['parent_id'] = $this->parentId;
        }

        if ($this->page !== static::DEFAULT_PAGE) {
            $params['page'] = $this->page;
        }

        if ($this->limit !== static::DEFAULT_LIMIT) {
            $params['limit'] = $this->limit;
        }

        if ($this->sort !== Comment::DEFAULT_SORT) {
            $params['sort'] = $this->sort;
        }

        return $params;
    }

    public function parentIdForWhere()
    {
        return $this->parentId === 0 ? null : $this->parentId;
    }
}
