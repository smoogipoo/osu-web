{{--
    Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
    See the LICENCE file in the repository root for full licence text.
--}}
@php
    $user = auth()->user();
@endphp

@extends('master', [
    'blank' => true,
])

@section('content')
    <div class="dialog-form">
        <div class="dialog-form__dialog">
            <div
                class="dialog-form__row dialog-form__row--header"
                style="background-image: url('{{ $user->profileCustomization()->cover()->url() }}')"
            >
                <div class="dialog-form__header-overlay"></div>
                <a
                    class="dialog-form__user-header"
                    href="{{ route('users.show', ['user' => $user->getKey()]) }}"
                >
                    <div class="dialog-form__user-avatar">
                        <div
                            class="avatar avatar--full-circle"
                            style="background-image: url('{{ $user->user_avatar }}')"
                        ></div>
                    </div>

                    {{ $user->username }}
                </a>
            </div>

            <div class="dialog-form__row dialog-form__row--title">
                <div class="dialog-form__logo"></div>
                <h1 class="dialog-form__title">{{ trans('oauth.authorise.title') }}</h1>
            </div>

            <div class="dialog-form__row dialog-form__row--label">
                <h2 class="dialog-form__client-name">
                    {{ $client->name }}
                </h2>
                <p class="dialog-form__client-request">
                    {{ trans('oauth.authorise.request') }}
                </p>
            </div>

            @if (count($scopes) > 0)
                <div class="dialog-form__row dialog-form__row--scopes">
                    <p class="dialog-form__scopes-title">
                        {{ trans('oauth.authorise.scopes_title') }}
                    </p>

                    <ul class="oauth-scopes oauth-scopes--oauth-form">
                        @foreach ($scopes as $scope)
                            <li>
                                <span class="oauth-scopes__icon">
                                    <span class="fas fa-check"></span>
                                </span>{{ $scope->description }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="dialog-form__row dialog-form__row--wrong-user">
                {!! trans('common.wrong_user._', [
                    'user' => e($user->username),
                    'logout_link' => link_to_route(
                        'logout',
                        trans('common.wrong_user.logout_link'),
                        [],
                        [
                            'class' => 'dialog-form__extra-link',
                            'data-confirm' => trans('users.logout_confirm'),
                            'data-method' => 'DELETE',
                            'data-reload-on-success' => '1',
                            'data-remote' => '1',
                        ]
                    ),
                ]) !!}
            </div>
            <div class="dialog-form__row dialog-form__row--buttons">
                {!! Form::open([
                    'url' => '/oauth/authorize',
                    'method' => 'POST',
                ]) !!}
                    <button class="dialog-form__button">
                        {{ trans('common.buttons.authorise') }}
                    </button>
                {!! Form::close() !!}

                {!! Form::open([
                    'url' => '/oauth/authorize',
                    'method' => 'DELETE',
                ]) !!}
                    <button
                        class="dialog-form__button dialog-form__button--cancel"
                    >
                        {{ trans('common.buttons.cancel') }}
                    </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
