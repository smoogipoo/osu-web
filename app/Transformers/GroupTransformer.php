<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

namespace App\Transformers;

use App\Models\Group;

class GroupTransformer extends TransformerAbstract
{
    public function transform(Group $group)
    {
        return [
            'id' => $group->getKey(),
            'identifier' => $group->identifier,
            'name' => $group->group_name,
            'short_name' => $group->short_name,
            'description' => $group->group_desc,
            'colour' => $group->colour,
        ];
    }
}
