<header class="header-group-simplified">
    <div class="header-simplified benu-container flex">
        <a class="header-simplified__logo-container" href="{{ route('home', [app()->getLocale()]) }}">
            <img src="{{ asset('images/svg/logo_benu_couture.svg') }}" class="header-simplified__logo header-simplified__logo--desktop">
            <img src="{{ asset('images/svg/benu-icon-menu-scroll.svg') }}" class="header-simplified__logo header-simplified__logo--scroll">
            <img src="{{ asset('images/svg/benu-icon-menu-scroll.svg') }}" class="header-simplified__logo header-simplified__logo--mobile">
        </a>
        <div class="header-simplified__menus-container flex flex-col justify-center">
            <div class="flex justify-between header-simplified__main-menu">
                <nav class="header-simplified__backlink flex justify-start">
                    <a href="{{ route('cart-'.app()->getLocale()) }}" class="primary-color flex">@svg('arrow_left', 'header-simplified__arrow-left') {{ __('cart.modify-cart') }}</a>
                </nav>
                <ul class="header-simplified__main-menu__icons flex justify-end">
                    <li class="header-simplified__main-menu__icons__info">
                        {{ __('cart.secure-payment') }}
                    </li>
                    @auth
                    <li style="margin-top: -12px;">
                        <a href="{{ route('dashboard', ['section' => 'overview']) }}" class="header__main-menu__icons__btn" id="dashboard-btn">
                            @svg('benu-icon-silhouette-disconnect')
                        </a>
                    </li>
                    @endauth
                    <li style="margin-top: -12px;">
                        <button class="header-simplified__main-menu__icons__lang-btn" id="lang-selector">
                            {{ strtoupper(app()->getLocale()) }}
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
