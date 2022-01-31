<header class="header-group">
    <div class="header benu-container flex">
        <a class="header__logo-container" href="{{ route('home', [app()->getLocale()]) }}">
            <img src="{{ asset('images/svg/logo_benu_couture.svg') }}" class="header__logo header__logo--desktop">
            <img src="{{ asset('images/svg/benu-icon-menu-scroll.svg') }}" class="header__logo header__logo--scroll">
            <img src="{{ asset('images/svg/benu-icon-menu-scroll.svg') }}" class="header__logo header__logo--mobile">
        </a>
        <div class="header__menus-container">
            <div class="flex justify-between header__top-menu">
                <nav class="header__top-nav flex justify-start">
                    <div>
                        <a href="{{ route('home', [app()->getLocale()]) }}" class="header__home-title">BENU COUTURE</a>
                    </div>
                    <ul class="flex justify-start header__top-nav__links">
                        <li><a href="#">{{ __('header.support') }}</a></li>
                        <li>|</li>
                        <li><a href="#">{{ __('header.about') }}</a></li>
                        <li>|</li>
                        <li><a href="#">{{ __('header.partners') }}</a></li>
                        <li>|</li>
                        <li><a href="#">{{ __('header.vouchers') }}</a></li>
                    </ul>
                </nav>
                <div class="header__newsletter-btn">
                    <a href="https://benu.lu/" class="header__newsletter-btn__link" target="_blank">
                        {{ __('header.newsletter') }}
                    </a>
                </div>
            </div>
            <div class="flex justify-between header__main-menu">
                <nav class="header__main-nav flex justify-start">
                    <div>
                        <button class="header__main-nav__btn" type="button" id="creations-nav-toggle">
                            @svg('benu-icon-squares-categories', 'header__main-nav__btn--logo-1')
                            {{ __('header.creations') }}
                            @svg('benu-icon-arrow-down', 'header__main-nav__btn--logo-2')
                        </button>
                    </div>
                    <a href="#" class="header__main-nav__link">{{ __('header.news') }}</a>
                    <a href="#" class="header__main-nav__link">{{ __('header.story') }}</a>
                    <a href="#" class="header__main-nav__link">{{ __('header.locations') }}</a>
                </nav>
                <ul class="header__main-menu__icons flex justify-end">
                    <li>
                        <button class="header__main-menu__icons__btn" id="general-search-btn">
                            @svg('benu-icon-magnifying-glass-search')
                        </button>
                    </li>
                    @auth
                        <li>
                            <button class="header__main-menu__icons__btn">
                                @svg('benu-icon-heart-favorites', '')
                            </button>
                        </li>
                    @endauth
                    @guest
                        <li>
                            <button class="header__main-menu__icons__btn" id="connect-btn">
                                @svg('benu-icon-silhouette-connect')
                            </button>
                        </li>
                    @else
                        <li>
                            <a href="{{ Route::currentRouteName() }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="header__main-menu__icons__btn">
                                @svg('benu-icon-silhouette-disconnect')
                            </a>
                            <form id="logout-form" action="{{ route('logout', ['locale' => app()->getLocale()]) }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                    <li>
                        <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="header__main-menu__icons__btn">
                            @svg('benu-icon-mail-contact')
                        </a>
                    </li>
                    <li>
                        <button class="header__main-menu__icons__btn">
                            @svg('benu-icon-bag-cart')
                        </button>
                    </li>
                    <li>
                        <button class="header__main-menu__icons__lang-btn" id="lang-selector">
                            {{ strtoupper(app()->getLocale()) }}
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="creations-navbar">
        <div class="creations-navbar__container">
            <nav class="creations-navbar__nav flex justify-start benu-container">
                <div class="creations-navbar__nav__toggle" id="nav-toggle-adult">
                    {{ __('header.adults') }} <i class="fas fa-angle-down"></i>
                </div>
                <div class="creations-navbar__nav__toggle" id="nav-toggle-woman">
                    {{ __('header.women') }} <i class="fas fa-angle-down"></i>
                </div>
                <div class="creations-navbar__nav__toggle" id="nav-toggle-man">
                    {{ __('header.men') }} <i class="fas fa-angle-down"></i>
                </div>
                <div class="creations-navbar__nav__toggle" id="nav-toggle-child">
                    {{ __('header.children') }} <i class="fas fa-angle-down"></i>
                </div>
                <div class="creations-navbar__nav__toggle" id="nav-toggle-accessories">
                    {{ __('header.accessories') }} <i class="fas fa-angle-down"></i>
                </div>
                <div class="creations-navbar__nav__toggle" id="nav-toggle-home">
                    {{ __('header.house') }} <i class="fas fa-angle-down"></i>
                </div>
            </nav>
        </div>
        <div class="creations-navbar__menu">
            <div class="benu-container">
                <div class="creations-navbar__menu__lists flex justify-start">
                    <div class="creations-navbar__menu__list navbar-list-adult">
                        <h4>{{ __('header.menu-title-1') }}</h4>
                        <div class="flex">
                            <ul>
                                <li><a href="#">Voir tout</a></li>
                                @for($i = 0; $i < 6; $i++)
                                    <li><a href="#">Item Adulte</a></li>
                                @endfor
                            </ul>
                            <ul>
                                @for($i = 0; $i < 7; $i++)
                                    <li><a href="#">Item Adulte</a></li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="creations-navbar__menu__list navbar-list-woman">
                        <h4>{{ __('header.menu-title-1') }}</h4>
                        <div class="flex">
                            <ul>
                                <li><a href="#">Voir tout</a></li>
                                @for($i = 0; $i < 6; $i++)
                                    <li><a href="#">Item Femme</a></li>
                                @endfor
                            </ul>
                            <ul>
                                @for($i = 0; $i < 7; $i++)
                                    <li><a href="#">Item Femme</a></li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="creations-navbar__menu__list navbar-list-man">
                        <h4>{{ __('header.menu-title-1') }}</h4>
                        <div class="flex">
                            <ul>
                                <li><a href="#">Voir tout</a></li>
                                @for($i = 0; $i < 6; $i++)
                                    <li><a href="#">Item Homme</a></li>
                                @endfor
                            </ul>
                            <ul>
                                @for($i = 0; $i < 7; $i++)
                                    <li><a href="#">Item Homme</a></li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="creations-navbar__menu__list navbar-list-child">
                        <h4>{{ __('header.menu-title-1') }}</h4>
                        <div class="flex">
                            <ul>
                                <li><a href="#">Voir tout</a></li>
                                @for($i = 0; $i < 6; $i++)
                                    <li><a href="#">Item Enfant</a></li>
                                @endfor
                            </ul>
                            <ul>
                                @for($i = 0; $i < 7; $i++)
                                    <li><a href="#">Item Enfant</a></li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="creations-navbar__menu__list navbar-list-accessories">
                        <h4>{{ __('header.menu-title-1') }}</h4>
                        <div class="flex">
                            <ul>
                                <li><a href="#">Voir tout</a></li>
                                @for($i = 0; $i < 6; $i++)
                                    <li><a href="#">Item Accessoire</a></li>
                                @endfor
                            </ul>
                            <ul>
                                @for($i = 0; $i < 7; $i++)
                                    <li><a href="#">Item Accessoire</a></li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="creations-navbar__menu__list navbar-list-home">
                        <h4>{{ __('header.menu-title-1') }}</h4>
                        <div class="flex">
                            <ul>
                                <li><a href="#">Voir tout</a></li>
                                @for($i = 0; $i < 6; $i++)
                                    <li><a href="#">Item Maison</a></li>
                                @endfor
                            </ul>
                            <ul>
                                @for($i = 0; $i < 7; $i++)
                                    <li><a href="#">Item Maison</a></li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    

                    <div class="creations-navbar__menu__list navbar-list-adult">
                        <h4>{{ __('header.menu-title-2') }}</h4>
                        <div class="flex">
                            <ul>
                                <li><a href="#">Voir tout</a></li>
                                @for($i = 0; $i < 6; $i++)
                                    <li><a href="#">Item Adulte</a></li>
                                @endfor
                            </ul>
                            <ul>
                                @for($i = 0; $i < 7; $i++)
                                    <li><a href="#">Item Adulte</a></li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="creations-navbar__menu__list navbar-list-woman">
                        <h4>{{ __('header.menu-title-2') }}</h4>
                        <div class="flex">
                            <ul>
                                <li><a href="#">Voir tout</a></li>
                                @for($i = 0; $i < 6; $i++)
                                    <li><a href="#">Item Femme</a></li>
                                @endfor
                            </ul>
                            <ul>
                                @for($i = 0; $i < 7; $i++)
                                    <li><a href="#">Item Femme</a></li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="creations-navbar__menu__list navbar-list-man">
                        <h4>{{ __('header.menu-title-2') }}</h4>
                        <div class="flex">
                            <ul>
                                <li><a href="#">Voir tout</a></li>
                                @for($i = 0; $i < 6; $i++)
                                    <li><a href="#">Item Homme</a></li>
                                @endfor
                            </ul>
                            <ul>
                                @for($i = 0; $i < 7; $i++)
                                    <li><a href="#">Item Homme</a></li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="creations-navbar__menu__list navbar-list-child">
                        <h4>{{ __('header.menu-title-2') }}</h4>
                        <div class="flex">
                            <ul>
                                <li><a href="#">Voir tout</a></li>
                                @for($i = 0; $i < 6; $i++)
                                    <li><a href="#">Item Enfant</a></li>
                                @endfor
                            </ul>
                            <ul>
                                @for($i = 0; $i < 7; $i++)
                                    <li><a href="#">Item Enfant</a></li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="creations-navbar__menu__list navbar-list-accessories">
                        <h4>{{ __('header.menu-title-2') }}</h4>
                        <div class="flex">
                            <ul>
                                <li><a href="#">Voir tout</a></li>
                                @for($i = 0; $i < 6; $i++)
                                    <li><a href="#">Item Accessoire</a></li>
                                @endfor
                            </ul>
                            <ul>
                                @for($i = 0; $i < 7; $i++)
                                    <li><a href="#">Item Accessoire</a></li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="creations-navbar__menu__list navbar-list-home">
                        <h4>{{ __('header.menu-title-2') }}</h4>
                        <div class="flex">
                            <ul>
                                <li><a href="#">Voir tout</a></li>
                                @for($i = 0; $i < 6; $i++)
                                    <li><a href="#">Item Maison</a></li>
                                @endfor
                            </ul>
                            <ul>
                                @for($i = 0; $i < 7; $i++)
                                    <li><a href="#">Item Maison</a></li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
