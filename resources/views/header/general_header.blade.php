<header class="header-group">
    <div class="header benu-container flex">
        <div id="mobile-menu-btn" class="mobile-only header__hamburger">
            <button>
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <a class="header__logo-container" href="{{ route('home', [app()->getLocale()]) }}">
            <!-- <img src="{{ asset('images/svg/logo_benu_couture.svg') }}" class="header__logo header__logo--desktop"> -->
            @svg('logo_benu_couture', 'header__logo header__logo--desktop')
            <img src="{{ asset('images/svg/benu-icon-menu-scroll.svg') }}" class="header__logo header__logo--scroll">
            <img src="{{ asset('images/svg/benu-icon-menu-scroll.svg') }}" class="header__logo header__logo--mobile">
        </a>
        <div class="header__menus-container">
            <div class="flex justify-between header__top-menu tablet-hidden">
                <nav class="header__top-nav flex justify-start">
                    <div>
                        <a href="{{ route('home', [app()->getLocale()]) }}" class="header__home-title">BENU COUTURE</a>
                    </div>
                    <ul class="flex justify-start header__top-nav__links tablet-hidden">
                        <li>
                            @if(Route::has('client-service-'.app()->getLocale()))
                            <a href="{{ route('client-service-'.app()->getLocale()) }}">{{ __('header.support') }}</a>
                            @else
                            <a href="{{ route('client-service', ['locale' => app()->getLocale()]) }}">{{ __('header.support') }}</a>
                            @endif
                        </li>
                        <li>|</li>
                        <li>
                            <a href="{{ route('full-story-'.app()->getLocale()) }}">{{ __('header.story') }}</a>
                        </li>
                        <li>|</li>
                        <!-- <li>
                            @if(Route::has('partners-'.app()->getLocale()))
                            <a href="{{ route('partners-'.app()->getLocale()) }}">{{ __('header.partners') }}</a>
                            @else
                            <a href="{{ route('partners', ['locale' => app()->getLocale()]) }}">{{ __('header.partners') }}</a>
                            @endif
                        </li>
                        <li>|</li> -->
                        <li>
                            <a href="{{ route('header.participate-'.app()->getLocale()) }}">{{ __('header.participate') }}</a>
                        </li>
                        <li>|</li>
                        <li>
                            @if(Route::has('vouchers-'.app()->getLocale()))
                            <a href="{{ route('vouchers-'.app()->getLocale()) }}">{{ __('header.vouchers') }}</a>
                            @else
                            <a href="{{ route('vouchers', ['locale' => app()->getLocale()]) }}">{{ __('header.vouchers') }}</a>
                            @endif
                        </li>
                    </ul>
                </nav>
                <div class="header__newsletter-btn">
                    @guest
                    <a href="{{ route('newsletter-'.app()->getLocale()) }}" class="header__newsletter-btn__link">
                        {{ __('header.newsletter') }}
                    </a>
                    @else
                        @if(auth()->user()->newsletter < 2)
                        <a href="{{ route('newsletter-'.app()->getLocale()) }}" class="header__newsletter-btn__link">
                            {{ __('header.newsletter') }}
                        </a>
                        @else
                        <a href="{{ route('newsletter-'.app()->getLocale()) }}" class="header__newsletter-btn__link">
                            {{ __('header.newsletter-unsubscribe') }}
                        </a>
                        @endif
                    @endguest
                    <!-- <a href="{{ route('dashboard') }}" class="header__newsletter-btn__link">
                        {{ __('header.dashboard') }}
                    </a> -->
                </div>
            </div>
            <div class="flex justify-between header__main-menu">
                <nav class="header__main-nav flex justify-start tablet-hidden">
                    <div>
                        <button class="header__main-nav__btn" type="button" id="creations-nav-toggle">
                            @svg('benu-icon-squares-categories', 'header__main-nav__btn--logo-1')
                            {{ __('header.creations') }}
                            @svg('benu-icon-arrow-down', 'header__main-nav__btn--logo-2')
                        </button>
                    </div>
                    @if(Route::has('news-'.app()->getLocale()))
                    <a href="{{ route('news-'.app()->getLocale()) }}" class="header__main-nav__link">{{ __('header.news') }}</a>
                    @else 
                    <a href="{{ route('news', ['locale' => app()->getLocale()]) }}" class="header__main-nav__link">{{ __('header.news') }}</a>
                    @endif

                    <a href="{{ route('about-'.app()->getLocale()) }}" class="header__main-nav__link">{{ __('header.about') }}</a>

                    @if(Route::has('client-service-'.app()->getLocale()))
                    <a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-shops')]) }}" class="header__main-nav__link">{{ __('header.locations') }}</a>
                    @else
                    <a href="{{ route('client-service', ['locale' => app()->getLocale(), 'page' => __('slugs.services-shops')]) }}" class="header__main-nav__link">{{ __('header.locations') }}</a>
                    @endif
                </nav>
                <nav class="mobile-only">
                    <div>
                        <a href="{{ route('home', [app()->getLocale()]) }}" class="header__home-title">BENU COUTURE</a>
                    </div>
                </nav>
                <ul class="header__main-menu__icons flex justify-end">
                    @if(1 == 0)
                    <li>
                        <button class="header__main-menu__icons__btn" id="general-search-btn">
                            @svg('benu-icon-magnifying-glass-search')
                        </button>
                    </li>
                    @endif
                    @auth
                        <li class="tablet-hidden">
                            <a href="{{ route('dashboard', ['locale' => app()->getLocale(), 'section' => 'wishlist']) }}" class="header__main-menu__icons__btn">
                                @svg('benu-icon-heart-favorites', '')
                            </a>
                        </li>
                    @endauth
                    @guest
                        <li class="tablet-hidden">
                            <a class="header__main-menu__icons__btn" id="connect-btn">
                                @svg('benu-icon-silhouette-connect')
                            </a>
                        </li>
                    @else
                        @livewire('components.dashboard-icon')
                    @endguest
                    <li class="tablet-hidden">
                        @if(Route::has('client-service-'.app()->getLocale()))
                        <a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-contact')]) }}" class="header__main-menu__icons__btn">
                            @svg('benu-icon-mail-contact')
                        </a>
                        @else
                        <a href="{{ route('client-service', ['locale' => app()->getLocale(), 'page' => __('slugs.services-contact')]) }}" class="header__main-menu__icons__btn">
                            @svg('benu-icon-mail-contact')
                        </a>
                        @endif
                    </li>
                    <li class="tablet-hidden">
                        @livewire('components.cart-header-icon')
                    </li>
                    <li class="header__main-menu__icons__lang-container">
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
                <div class="creations-navbar__nav__toggle flex" id="nav-toggle-unisex">
                    {{ __('header.unisex') }} @svg('chevron-down')
                </div>
                <div class="creations-navbar__nav__toggle flex" id="nav-toggle-woman">
                    {{ __('header.women') }} @svg('chevron-down')
                </div>
                <div class="creations-navbar__nav__toggle flex" id="nav-toggle-man">
                    {{ __('header.men') }} @svg('chevron-down')
                </div>
                <div class="creations-navbar__nav__toggle flex" id="nav-toggle-adult">
                    {{ __('header.adults') }} @svg('chevron-down')
                </div>
                <div class="creations-navbar__nav__toggle flex" id="nav-toggle-child">
                    {{ __('header.children') }} @svg('chevron-down')
                </div>
                <div class="creations-navbar__nav__toggle flex" id="nav-toggle-accessories">
                    {{ __('header.accessories') }} @svg('chevron-down')
                </div>
                <div class="creations-navbar__nav__toggle flex" id="nav-toggle-home">
                    {{ __('header.house') }} @svg('chevron-down')
                </div>
                <!-- <a href="{{ route('model-'.app()->getLocale(), ['family' => 'home']) }}" class="creations-navbar__nav__toggle-link">
                    {{ __('header.house') }}
                </a> -->
                <a href="{{ route('vouchers-'.app()->getLocale()) }}" class="creations-navbar__nav__toggle-link">
                    {{ __('header.vouchers') }}
                </a>
            </nav>
        </div>
        @livewire('header.creations-menu')
    </div>
</header>
