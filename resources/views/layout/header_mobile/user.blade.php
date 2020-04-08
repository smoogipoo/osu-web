{{--
    Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
    See the LICENCE file in the repository root for full licence text.
--}}
<div class="navbar-mobile-item js-click-menu--close">
    @if (Auth::check())
        <div
            class="navbar-mobile-item__main js-react--user-card"
            data-user="{{ json_encode(Auth::user()->defaultJson()) }}"
        ></div>

        <a
            class="navbar-mobile-item__main"
            href="{{ route('users.show', Auth::user()) }}"
        >
            {{ trans('layout.popup_user.links.profile') }}
        </a>

        <a class="navbar-mobile-item__main" href="{{ route('friends.index') }}">
            {{ trans('layout.popup_user.links.friends') }}
        </a>

        <a class="navbar-mobile-item__main" href="{{ route('account.edit') }}">
            {{ trans('layout.popup_user.links.account-edit') }}
        </a>

        <button
            class="js-logout-link navbar-mobile-item__main"
            type="button"
            data-url="{{ route('logout') }}"
            data-confirm="{{ trans('users.logout_confirm') }}"
            data-method="delete"
            data-remote="1"
        >
            {{ trans('layout.popup_user.links.logout') }}
        </button>
    @else
        <a
            class="js-user-link navbar-mobile-item__main navbar-mobile-item__main--user"
            href="#"
            title="{{ trans('users.anonymous.login_link') }}"
        >
            <span class="avatar avatar--guest avatar--navbar-mobile"></span>

            {{ trans('users.anonymous.username') }}
        </a>
    @endif
</div>
