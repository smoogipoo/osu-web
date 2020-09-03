<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

namespace App\Models\OAuth;

use Laravel\Passport\Token as PassportToken;

class Token extends PassportToken
{
    public function isClientCredentials()
    {
        // explicitly no user_id.
        return $this->user_id === null;
    }

    public function refreshToken()
    {
        return $this->hasOne(RefreshToken::class, 'access_token_id');
    }

    public function user()
    {
        $provider = config('auth.guards.api.provider');

        return $this->belongsTo(config('auth.providers.'.$provider.'.model'), 'user_id');
    }
}
