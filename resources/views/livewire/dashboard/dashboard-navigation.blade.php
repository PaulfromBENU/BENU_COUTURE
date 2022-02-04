<section class="dashboard flex justify-start">
    <div class="dashboard__nav">
        <div style="position: sticky; top: 150px;">
            <h2 class="dashboard__nav__title">@if(date('H') > 22 || date('H') < 6) Bonsoir, @else Bonjour, @endif <strong>{{ Auth::user()->first_name }}</strong></h2>
            <ul class="dashboard__nav__links">
                <li>
                    <a wire:click="changeSection('overview')" class="btn-slider-left dashboard__nav__link @if($section == 'overview') dashboard__nav__link--active @endif">
                        Tableau de bord
                    </a>
                </li>
                <li>
                    <a wire:click="changeSection('orders')" class="btn-slider-left dashboard__nav__link @if($section == 'orders') dashboard__nav__link--active @endif">
                        Mes commandes
                    </a>
                </li>
                <li>
                    <a wire:click="changeSection('demands')" class="btn-slider-left dashboard__nav__link @if($section == 'demands') dashboard__nav__link--active @endif">
                        Mes demandes
                    </a>
                </li>
                <li>
                    <a wire:click="changeSection('returns')" class="btn-slider-left dashboard__nav__link @if($section == 'returns') dashboard__nav__link--active @endif">
                        Mes retours
                    </a>
                </li>
                <li>
                    <a wire:click="changeSection('wishlist')" class="btn-slider-left dashboard__nav__link @if($section == 'wishlist') dashboard__nav__link--active @endif">
                        Ma wishlist
                    </a>
                </li>
                <li>
                    <a wire:click="changeSection('addresses')" class="btn-slider-left dashboard__nav__link @if($section == 'addresses') dashboard__nav__link--active @endif">
                        Mes adresses
                    </a>
                </li>
                <li>
                    <a wire:click="changeSection('details')" class="btn-slider-left dashboard__nav__link @if($section == 'details') dashboard__nav__link--active @endif">
                        Détails du compte
                    </a>
                </li>
                <li>
                    <a wire:click="changeSection('delete')" class="btn-slider-left dashboard__nav__link @if($section == 'delete') dashboard__nav__link--active @endif">
                        Suppression du compte
                    </a>
                </li>
            </ul>
            <div class="dashboard__nav__logout">
                <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn-couture-plain">Me déconnecter</button>
            </div>
        </div>
    </div>

    <div class="dashboard__content flex justify-start flex-wrap">
        <!-- <div wire:loading>
            LOADING CONTENT...
        </div> -->
        @switch($section)
            @case('overview')
                @include('includes.dashboard.overview')
                @break

            @case('orders')
                @include('includes.dashboard.orders')
                @break

            @case('demands')
                @include('includes.dashboard.demands')
                @break

            @case('returns')
                @include('includes.dashboard.returns')
                @break

            @case('wishlist')
                @include('includes.dashboard.wishlist')
                @break

            @case('addresses')
                @include('includes.dashboard.addresses')
                @break

            @case('details')
                @include('includes.dashboard.details')
                @break

            @case('delete')
                @include('includes.dashboard.delete')
                @break

            @default
                @include('includes.dashboard.overview')
                @break
        @endswitch
    </div>
</section>