<div class="dashboard__content__box dashboard__content__box--large">
    <h3 class="dashboard__content__box__title">{{ __('dashboard.overview-title-1') }}</h3>
    <div class="w-1/2">
        <h4 class="dashboard__content__box__subtitle">
            {{ Auth::user()->first_name.' '.Auth::user()->last_name }} <br/>({!! __('dashboard.client-number') !!}: {{ Auth::user()->client_number }})
        </h4>
        <p>
            {{ __('dashboard.overview-member-since') }} {{ Auth::user()->created_at->format('d'.'/'.'m'.'/'.'Y') }}
        </p>
    </div>
    <div class="w-1/2 dashboard__content__box__low-links">
        <div class="flex flex-col justify-end">
            <p>
                <a wire:click="changeSection('details')" class="btn-dashboard-plain">{{ __('dashboard.overview-account-details') }}</a>
            </p>
            <p>
                <a wire:click="changeSection('delete')" class="btn-dashboard-plain">{{ __('dashboard.overview-delete-account') }}</a>
            </p>
        </div>
    </div>
</div>
<div class="dashboard__content__box dashboard__content__box--normal">
    <h3 class="dashboard__content__box__title">{{ __('dashboard.overview-title-2') }}</h3>
    <p>
        {{ __('dashboard.overview-update-address') }}
    </p>
    <p class="dashboard__content__box__bottom-link">
        <a wire:click="changeSection('addresses')" class="btn-dashboard-plain">{{ __('dashboard.overview-all-addresses') }}</a>
    </p>
</div>
<div class="dashboard__content__box dashboard__content__box--normal">
    <h3 class="dashboard__content__box__title">{{ __('dashboard.overview-title-3') }}</h3>
    <p>
        {{ __('dashboard.overview-update-orders') }}
    </p>
    <p class="dashboard__content__box__bottom-link">
        <a wire:click="changeSection('orders')" class="btn-dashboard-plain">{{ __('dashboard.overview-all-orders') }}</a>
    </p>
</div>
<div class="dashboard__content__box dashboard__content__box--normal">
    <h3 class="dashboard__content__box__title">{{ __('dashboard.overview-title-4') }}</h3>
    <p>
        {{ __('dashboard.overview-update-demands') }}
    </p>
    <p class="dashboard__content__box__bottom-link">
        <a wire:click="changeSection('demands')" class="btn-dashboard-plain">{{ __('dashboard.overview-all-demands') }}</a>
    </p>
</div>
<div class="dashboard__content__box dashboard__content__box--normal">
    <h3 class="dashboard__content__box__title">{{ __('dashboard.overview-title-5') }}</h3>
    <p>
        {{ __('dashboard.overview-update-returns') }}
    </p>
    <p class="dashboard__content__box__bottom-link">
        <a wire:click="changeSection('returns')" class="btn-dashboard-plain">{{ __('dashboard.overview-all-returns') }}</a>
    </p>
</div>
<div class="dashboard__content__box dashboard__content__box--normal">
    <h3 class="dashboard__content__box__title">{{ __('dashboard.overview-title-6') }}</h3>
    <p>
        {{ __('dashboard.overview-update-wishlist') }}
    </p>
    <p class="dashboard__content__box__bottom-link">
        <a wire:click="changeSection('wishlist')" class="btn-dashboard-plain">{{ __('dashboard.overview-see-wishlist') }}</a>
    </p>
</div>