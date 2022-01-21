<header class="header-group">
    <div class="header benu-container flex">
        <a class="header__logo-container" href="{{ route('home') }}">
            <img src="{{ asset('images/logo_benu_couture.svg') }}" class="header__logo header__logo--desktop">
            <img src="{{ asset('images/logo_benu_couture_blanc.svg') }}" class="header__logo header__logo--scroll">
            <img src="{{ asset('images/logo_benu_couture.svg') }}" class="header__logo header__logo--mobile">
        </a>
        <div class="header__menus-container">
            <div class="flex justify-between header__top-menu">
                <nav class="header__top-nav flex justify-start">
                    <div>
                        <a href="{{ route('home') }}" class="header__home-title">BENU COUTURE</a>
                    </div>
                    <ul class="flex justify-start header__top-nav__links">
                        <li><a href="#">Service Client</a></li>
                        <li>|</li>
                        <li><a href="#">À propos</a></li>
                        <li>|</li>
                        <li><a href="#">Partenaires</a></li>
                    </ul>
                </nav>
                <div class="header__newsletter-btn">
                    <a href="https://benu.lu/" class="header__newsletter-btn__link" target="_blank">
                        {{ __('Abonnez-vous à la newsletter') }}
                    </a>
                </div>
            </div>
            <div class="flex justify-between header__main-menu">
                <nav class="header__main-nav flex justify-start">
                    <div>
                        <button class="header__main-nav__btn" type="button" id="creations-nav-toggle">
                            <img src="{{ asset('images/logo_benu_couture.svg') }}" class="header__main-nav__btn--logo-1">
                            Créations
                            <img src="{{ asset('images/logo_benu_couture.svg') }}" class="header__main-nav__btn--logo-2">
                        </button>
                    </div>
                    <a href="#" class="header__main-nav__link">Actualités</a>
                    <a href="#" class="header__main-nav__link">Histoire</a>
                </nav>
                <ul class="header__main-menu__icons flex justify-end">
                    <li>
                        <button class="header__main-menu__icons__btn">
                            <img src="{{ asset('images/logo_benu_couture.svg') }}">
                        </button>
                    </li>
                    @auth
                        <li>
                            <button class="header__main-menu__icons__btn">
                                <img src="{{ asset('images/logo_benu_couture.svg') }}">
                            </button>
                        </li>
                    @endauth
                    @guest
                        <li>
                            <button class="header__main-menu__icons__btn">
                                <img src="{{ asset('images/logo_benu_couture.svg') }}">
                            </button>
                        </li>
                    @else
                        <li>
                            <button class="header__main-menu__icons__btn">
                                <img src="{{ asset('images/logo_benu_couture.svg') }}">
                            </button>
                        </li>
                    @endguest
                    <li>
                        <button class="header__main-menu__icons__btn">
                            <img src="{{ asset('images/logo_benu_couture.svg') }}">
                        </button>
                    </li>
                    <li>
                        <button class="header__main-menu__icons__btn">
                            <img src="{{ asset('images/logo_benu_couture.svg') }}">
                        </button>
                    </li>
                    <li>
                        <button class="header__main-menu__icons__lang-btn" id="lang-selector">
                            FR
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="creations-navbar">
        <div class="creations-navbar__container benu-container">
            <nav class="creations-navbar__nav flex justify-start">
                <div class="creations-navbar__nav__toggle" id="nav-toggle-adult">
                    Adultes <i class="fas fa-angle-down"></i>
                </div>
                <div class="creations-navbar__nav__toggle" id="nav-toggle-woman">
                    Femmes <i class="fas fa-angle-down"></i>
                </div>
                <div class="creations-navbar__nav__toggle" id="nav-toggle-man">
                    Hommes <i class="fas fa-angle-down"></i>
                </div>
                <div class="creations-navbar__nav__toggle" id="nav-toggle-child">
                    Enfants <i class="fas fa-angle-down"></i>
                </div>
                <div class="creations-navbar__nav__toggle" id="nav-toggle-accessories">
                    Accessoires <i class="fas fa-angle-down"></i>
                </div>
                <div class="creations-navbar__nav__toggle" id="nav-toggle-home">
                    Maison <i class="fas fa-angle-down"></i>
                </div>
            </nav>
        </div>
        <div class="creations-navbar__menu benu-container">
            <div class="creations-navbar__menu__lists flex justify-start">
                <div class="creations-navbar__menu__list navbar-list-adult">
                    <h4>Vêtements</h4>
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
                    <h4>Vêtements</h4>
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
                    <h4>Vêtements</h4>
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
                    <h4>Vêtements</h4>
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
                    <h4>Vêtements</h4>
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
                    <h4>Vêtements</h4>
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
                    <h4>Accessoires</h4>
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
                    <h4>Accessoires</h4>
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
                    <h4>Accessoires</h4>
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
                    <h4>Accessoires</h4>
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
                    <h4>Accessoires</h4>
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
                    <h4>Accessoires</h4>
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
</header>
