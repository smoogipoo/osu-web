{{--
    Copyright (c) ppy Pty Ltd <contact@ppy.sh>.

    This file is part of osu!web. osu!web is distributed with the hope of
    attracting more community contributions to the core ecosystem of osu!.

    osu!web is free software: you can redistribute it and/or modify
    it under the terms of the Affero GNU General Public License version 3
    as published by the Free Software Foundation.

    osu!web is distributed WITHOUT ANY WARRANTY; without even the implied
    warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
    See the GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with osu!web.  If not, see <http://www.gnu.org/licenses/>.
--}}
@extends('master', [
    'blank' => true,
    'title' => trans('accounts.verification_completed.title'),
])

@section('content')
    <div class="oauth-form">
        <div class="oauth-form__dialog">
            <div class="oauth-form__row oauth-form__row--header"></div>

            <div class="oauth-form__row oauth-form__row--title">
                <div class="oauth-form__logo"></div>
                <h1 class="oauth-form__title">{{ trans('users.verify.title') }}</h1>
            </div>

            <div class="oauth-form__row oauth-form__row--verification-completed">
                <div class="account-verification-message">
                    <div class="account-verification-message__icon">
                        <span class="far fa-check-circle"></span>
                    </div>

                    <div class="account-verification-message__title">
                        {{ trans('accounts.verification_completed.title') }}
                    </div>

                    <div class="account-verification-message__text">
                        {{ trans('accounts.verification_completed.text') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
