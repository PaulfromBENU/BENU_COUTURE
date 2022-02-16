<div class="creations-navbar__menu">
    <div class="benu-container">
        <div class="creations-navbar__menu__lists flex justify-start">
            <div class="creations-navbar__menu__list navbar-list-unisex">
                <h4>{{ __('header.menu-title-1') }}</h4>
                <div class="flex">
                    <ul>
                        <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'unisex']) }}">Voir tous les vêtements unisexe</a></li>
                        @foreach($unisex_clothes as $category => $link_query)
                            @if($loop->index < 6)
                                <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'unisex', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                    <ul>
                        @if(count($unisex_clothes) > 6)
                            @foreach($unisex_clothes as $category => $link_query)
                                @if($loop->index >= 6)
                                    <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'unisex', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="creations-navbar__menu__list navbar-list-adult">
                <h4>{{ __('header.menu-title-1') }}</h4>
                <div class="flex">
                    <ul>
                        <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'ladies*gentlemen*unisex']) }}">Voir tous les vêtements adultes</a></li>
                        @foreach($adults_clothes as $category => $link_query)
                            @if($loop->index < 6)
                                <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'unisex*ladies*gentlemen', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                    <ul>
                        @if(count($adults_clothes) > 6)
                            @foreach($adults_clothes as $category => $link_query)
                                @if($loop->index >= 6)
                                    <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'unisex*ladies*gentlemen', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="creations-navbar__menu__list navbar-list-woman">
                <h4>{{ __('header.menu-title-1') }}</h4>
                <div class="flex">
                    <ul>
                        <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'ladies']) }}">Voir tous les vêtements femmes</a></li>
                        @foreach($ladies_clothes as $category => $link_query)
                            @if($loop->index < 6)
                                <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'ladies', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                    <ul>
                        @if(count($ladies_clothes) > 6)
                            @foreach($ladies_clothes as $category => $link_query)
                                @if($loop->index >= 6)
                                    <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'ladies', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="creations-navbar__menu__list navbar-list-man">
                <h4>{{ __('header.menu-title-1') }}</h4>
                <div class="flex">
                    <ul>
                        <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'gentlemen']) }}">Voir tous les vêtements hommes</a></li>
                        @foreach($gentlemen_clothes as $category => $link_query)
                            @if($loop->index < 6)
                                <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'gentlemen', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                    <ul>
                        @if(count($gentlemen_clothes) > 6)
                            @foreach($gentlemen_clothes as $category => $link_query)
                                @if($loop->index >= 6)
                                    <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'gentlemen', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="creations-navbar__menu__list navbar-list-child">
                <h4>{{ __('header.menu-title-1') }}</h4>
                <div class="flex">
                    <ul>
                        <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'kids']) }}">Voir tous les vêtements enfants</a></li>
                        @foreach($kids_clothes as $category => $link_query)
                            @if($loop->index < 6)
                                <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'kids', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                    <ul>
                        @if(count($kids_clothes) > 6)
                            @foreach($kids_clothes as $category => $link_query)
                                @if($loop->index >= 6)
                                    <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'kids', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="creations-navbar__menu__list navbar-list-accessories">
                <h4>{{ __('header.menu-title-2') }}</h4>
                <div class="flex">
                    <ul>
                        <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'accessories']) }}">Voir tous les accessoires</a></li>
                        @foreach($accessories as $category => $link_query)
                            @if($loop->index < 6)
                                <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'accessories', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                    <ul>
                        @if(count($accessories) > 6)
                            @foreach($accessories as $category => $link_query)
                                @if($loop->index >= 6)
                                    <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'accessories', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="creations-navbar__menu__list navbar-list-home">
                <h4>{{ __('header.menu-title-1') }}</h4>
                <div class="flex">
                    <ul>
                        <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'home']) }}">Voir toutes les créations pour la maison</a></li>
                        @foreach($home_creations as $category => $link_query)
                            @if($loop->index < 6)
                                <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'home', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                    <ul>
                        @if(count($home_creations) > 6)
                            @foreach($home_creations as $category => $link_query)
                                @if($loop->index >= 6)
                                    <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'home', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            

            <div class="creations-navbar__menu__list navbar-list-unisex">
                <h4>{{ __('header.menu-title-2') }}</h4>
                <div class="flex">
                    <ul>
                        <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'unisex*accessories']) }}">Voir tous les accessoires unisexe</a></li>
                        @foreach($unisex_accessories as $category => $link_query)
                            @if($loop->index < 6)
                                <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'unisex*accessories', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                    <ul>
                        @if(count($unisex_accessories) > 6)
                            @foreach($unisex_accessories as $category => $link_query)
                                @if($loop->index >= 6)
                                    <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'unisex*accessories', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="creations-navbar__menu__list navbar-list-adult">
                <h4>{{ __('header.menu-title-2') }}</h4>
                <div class="flex">
                    <ul>
                        <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'ladies*gentlemen*unisex*accessories']) }}">Voir tous les accessoires adultes</a></li>
                        @foreach($adults_accessories as $category => $link_query)
                            @if($loop->index < 6)
                                <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'unisex*ladies*gentlemen', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                    <ul>
                        @if(count($adults_accessories) > 6)
                            @foreach($adults_accessories as $category => $link_query)
                                @if($loop->index >= 6)
                                    <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'unisex*ladies*gentlemen', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="creations-navbar__menu__list navbar-list-woman">
                <h4>{{ __('header.menu-title-2') }}</h4>
                <div class="flex">
                    <ul>
                        <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'ladies*accessories']) }}">Voir tous les accessoires femmes</a></li>
                        @foreach($ladies_accessories as $category => $link_query)
                            @if($loop->index < 6)
                                <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'ladies*accessories', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                    <ul>
                        @if(count($ladies_accessories) > 6)
                            @foreach($ladies_accessories as $category => $link_query)
                                @if($loop->index >= 6)
                                    <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'ladies*accessories', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="creations-navbar__menu__list navbar-list-man">
                <h4>{{ __('header.menu-title-2') }}</h4>
                <div class="flex">
                    <ul>
                        <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'gentlemen*accessories']) }}">Voir tous les accessoires hommes</a></li>
                        @foreach($gentlemen_accessories as $category => $link_query)
                            @if($loop->index < 6)
                                <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'gentlemen*accessories', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                    <ul>
                        @if(count($gentlemen_accessories) > 6)
                            @foreach($gentlemen_accessories as $category => $link_query)
                                @if($loop->index >= 6)
                                    <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'gentlemen*accessories', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="creations-navbar__menu__list navbar-list-child">
                <h4>{{ __('header.menu-title-2') }}</h4>
                <div class="flex">
                    <ul>
                        <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'kids*accessories']) }}">Voir tous les accessoires enfants</a></li>
                        @foreach($kids_accessories as $category => $link_query)
                            @if($loop->index < 6)
                                <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'kids*accessories', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                    <ul>
                        @if(count($kids_accessories) > 6)
                            @foreach($kids_accessories as $category => $link_query)
                                @if($loop->index >= 6)
                                    <li><a href="{{ route('model-'.app()->getLocale(), ['types' => 'kids*accessories', 'categories' => $link_query]) }}">{{ $category }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <!-- <div class="creations-navbar__menu__list navbar-list-accessories">
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
            </div> -->
        </div>
    </div>
</div>