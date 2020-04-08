{{--
    Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
    See the LICENCE file in the repository root for full licence text.
--}}
@foreach (nav_links() as $section => $links)
    <div class="navbar-mobile-item">
        <a
            data-click-menu-target="nav-mobile-{{ $section }}"
            class="navbar-mobile-item__main js-click-menu"
            href="{{ $links['_'] ?? array_values($links)[0] }}"
        >
            <span class="navbar-mobile-item__icon navbar-mobile-item__icon--closed">
                <i class="fas fa-chevron-right"></i>
            </span>

            <span class="navbar-mobile-item__icon navbar-mobile-item__icon--opened">
                <i class="fas fa-chevron-down"></i>
            </span>

            {{ trans("layout.menu.{$section}._") }}
        </a>

        <ul class="navbar-mobile-item__submenu js-click-menu" data-click-menu-id="nav-mobile-{{ $section }}">
            @foreach ($links as $action => $link)
                @if ($action === '_')
                    @continue
                @endif
                <li>
                    <a
                        class="navbar-mobile-item__submenu-item js-click-menu--close"
                        href="{{ $link }}"
                    >
                        {{ trans("layout.menu.$section.$action") }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endforeach

<div class="navbar-mobile-item">
    <button
        class="navbar-mobile-item__main js-click-menu"
        data-click-menu-target="nav-mobile-locale"
    >
        <span class="navbar-mobile-item__icon navbar-mobile-item__icon--closed">
            <i class="fas fa-chevron-right"></i>
        </span>

        <span class="navbar-mobile-item__icon navbar-mobile-item__icon--opened">
            <i class="fas fa-chevron-down"></i>
        </span>

        <span
            class="navbar-mobile-item__locale-flag"
            style="background-image: url('{{ flag_path(locale_flag(App::getLocale())) }}')"
        ></span>

        {{ locale_name(App::getLocale()) }}
    </button>

    <ul class="navbar-mobile-item__submenu js-click-menu" data-click-menu-id="nav-mobile-locale">
        @foreach (config('app.available_locales') as $locale)
            <li>
                <a
                    class="navbar-mobile-item__submenu-item js-click-menu--close"
                    href="{{ route('set-locale', compact('locale')) }}"
                    data-remote="1"
                    data-method="POST"
                >
                    <span
                        class="navbar-mobile-item__locale-flag"
                        style="background-image: url('{{ flag_path(locale_flag($locale)) }}')"
                    ></span>

                    {{ locale_name($locale) }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
