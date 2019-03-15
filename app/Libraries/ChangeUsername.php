<?php

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

namespace App\Libraries;

use App\Models\User;
use App\Traits\Validatable;

class ChangeUsername
{
    use Validatable;

    /** @var User */
    protected $user;

    protected $username;

    public static function requireSupportedMessage()
    {
        $link = link_to(
            route('support-the-game'),
            trans('model_validation.user.change_username.supporter_required.link_text')
        );

        return trans('model_validation.user.change_username.supporter_required._', ['link' => $link]);
    }

    public function __construct(User $user, string $newUsername)
    {
        $this->username = $newUsername;
        $this->user = $user;
    }

    public function validate() : ValidationErrors
    {
        $this->validationErrors()->reset();
        if ($this->user->user_id <= 1) {
            return $this->validationErrors()->addTranslated('user_id', 'This user cannot be renamed');
        }

        if (!$this->user->hasSupported()) {
            return $this->validationErrors()->addTranslated('username', static::requireSupportedMessage());
        }

        if ($this->username === $this->user->username) {
            return $this->validationErrors()->add('username', '.change_username.username_is_same');
        }

        if ($this->validationErrors()->merge(UsernameValidation::validateUsername($this->username))->isAny()) {
            return $this->validationErrors();
        }

        if ($this->validationErrors()->merge(UsernameValidation::validateAvailability($this->username))->isAny()) {
            return $this->validationErrors();
        }

        return $this->validationErrors()->merge(UsernameValidation::validateUsersOfUsername($this->username));
    }

    public function validationErrorsTranslationPrefix()
    {
        return 'user';
    }
}
