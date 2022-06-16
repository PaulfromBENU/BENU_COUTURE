<div class="voucher-sidebar flex justify-right">
    @if($voucher_id != '0')
        <div class="article-sidebar__img-container">
            <div style="height: 100%;">
                <img src="{{ asset('images/pictures/vouchers_img.png') }}" alt="BENU vouchers" title="BENU Vouchers" class="w-full">
            </div>
        </div>
        <div class="article-sidebar__content">
            <div class="article-sidebar__content__close-container" wire:click="closeVoucherSideBar">
                <div class="article-sidebar__content__close">
                    {{ __('sidebar.close') }} <span class="pl-2">&#10005;</span>
                </div>
            </div>
            <p class="article-sidebar__content__compo__subtitle" wire:click="switchDisplay('overview')" @if($content == 'overview') style="display: none;" @endif>
                < {{ __('sidebar.back') }}
            </p>

            @if($content == 'overview')
                <h3 class="article-sidebar__content__subtitle">
                    
                </h3>

                @auth
                <div class="article-sidebar__content__wishlist mb-10" wire:click="toggleWishlist" style="height: 30px;">
                    @if(!$is_wishlisted)
                    <div class="article-sidebar__content__wishlist__icon">
                        <i class="far fa-heart"></i>
                    </div>
                    <div class="article-sidebar__content__wishlist__icon article-sidebar__content__wishlist__icon--hovered">
                        <i class="fas fa-heart"></i>
                    </div>
                    @else
                    <div class="article-sidebar__content__wishlist__icon article-sidebar__content__wishlist__icon--active">
                        <i class="fas fa-heart"></i>
                    </div>
                    @endif
                </div>
                @else
                <div class="article-sidebar__content__wishlist tooltip" wire:click.prevent.stop="toggleWishlist">
                    <div class="article-sidebar__content__wishlist__icon">
                        <i class="far fa-heart"></i>
                    </div>
                    <div class="article-sidebar__content__wishlist__icon article-sidebar__content__wishlist__icon--hovered">
                        <i class="fas fa-heart"></i>
                    </div>
                    <span class="tooltiptext tooltiptext--top">
                        {!! __('models.please-login') !!}
                    </span>
                </div>
                @endauth

                <div class="article-sidebar__content__size" style="width: fit-content;">
                    @if($voucher->voucher_type == 'pdf')
                    PDF
                    @else
                    {{ __('vouchers.fabric') }}
                    @endif
                </div>

                <h2 class="article-sidebar__content__title">
                    {{ __('vouchers.voucher') }}
                </h2>

                <p class="article-sidebar__content__desc">
                    {!! __('vouchers.offer-wish') !!}
                </p>

                <div class="flex justify-between">
                    <div class="article-sidebar__content__voucher-value @if($voucher_value == 30) article-sidebar__content__voucher-value--active @endif" wire:click="updateValue(30)">30&euro;</div>
                    <div class="article-sidebar__content__voucher-value @if($voucher_value == 60) article-sidebar__content__voucher-value--active @endif" wire:click="updateValue(60)">60&euro;</div>
                </div>
                <div class="flex justify-between">
                    <div class="article-sidebar__content__voucher-value @if($voucher_value == 90) article-sidebar__content__voucher-value--active @endif" wire:click="updateValue(90)">90&euro;</div>
                    <div class="article-sidebar__content__voucher-value @if($voucher_value == 120) article-sidebar__content__voucher-value--active @endif" wire:click="updateValue(120)">120&euro;</div>
                </div>
                <div class="flex justify-between">
                    <div class="article-sidebar__content__voucher-value @if($voucher_value == 150) article-sidebar__content__voucher-value--active @endif" wire:click="updateValue(150)">150&euro;</div>
                    <div class="article-sidebar__content__voucher-value @if($voucher_value == 180) article-sidebar__content__voucher-value--active @endif" wire:click="updateValue(180)">180&euro;</div>
                </div>

                @if($voucher->$singularity_query != "")
                <p class="article-sidebar__content__singularity">
                    <span class="primary-color">{!! __('sidebar.singularity') !!}</span> {{ $voucher->$singularity_query }}
                </p>
                @endif

                <form method="POST" wire:submit.prevent="addToCart">
                    @csrf

                    <input type="hidden" name="voucher_value" wire:model="voucher_value">
                    <input type="hidden" name="voucher_type" wire:model="voucher_type">

                    @if($sent_to_cart == 0)
                    <button class="btn-couture-plain article-sidebar__content__cart-btn" type="submit">
                        {{ __('vouchers.add-to-cart') }}
                    </button>
                    @else
                    <p class="text-center mb-2">
                        {{ __('vouchers.added-to-cart') }}&nbsp;!
                    </p>
                    <a href="{{ route('cart-'.app()->getLocale()) }}" class="block btn-couture-plain btn-couture-plain--fit article-sidebar__content__cart-btn">
                        {{ __('vouchers.go-to-cart') }}
                    </a>
                    @endif
                </form>

                <ul class="article-sidebar__content__list">
                    <li class="flex justify-between" wire:click="switchDisplay('delivery')">
                        <p>{{ __('sidebar.delivery') }}</p> @svg('chevron-down')
                    </li>
                    <li class="flex justify-between" wire:click="switchDisplay('more')">
                        <p>{{ __('sidebar.more-details') }}</p> @svg('chevron-down')
                    </li>
                </ul>

                <p class="article-sidebar__content__contact">
                    {!! __('sidebar.questions') !!} <a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-contact')]) }}" target="_blank" class="primary-color">{{ __('sidebar.contact-us') }}</a>
                </p>
             
            @elseif($content == 'delivery')
            <h3 class="article-sidebar__content__compo__title mb-3">
                {!! __('sidebar.delivery-costs-vouchers') !!}
            </h3>
            <p class="mb-10 text-sm font-medium">
                {!! __('sidebar.delivery-costs-vouchers-info-1') !!}
                <a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-delivery')]) }}" target="_blank" class="primary-color hover:underline">{!! __('sidebar.delivery-costs-vouchers-info-1-link') !!}</a>.
            </p>

            <h3 class="article-sidebar__content__compo__title mb-3">
                {!! __('sidebar.returns-vouchers') !!}
            </h3>
            <p class="mb-2 text-sm font-medium">
                {!! __('sidebar.returns-vouchers-info-1') !!}
                <a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-return')]) }}" target="_blank" class="primary-color hover:underline">{!! __('sidebar.returns-vouchers-info-1-link') !!}</a>.
            </p>

            @elseif($content == 'more')
                <h3 class="article-sidebar__content__compo__title">
                    {{ __('sidebar.more-details') }}
                </h3>

                <h5 class="article-sidebar__content__compo__title-expl mb-10">{!! __('sidebar.more-details-title') !!}</h5>

                <ul class="article-sidebar__content__more__list">
                    <li class="mb-5">Specifique aux bons d'achat - À compléter...</li>
                    <li class="flex mb-5">
                        <div class="pt-2">
                            @svg('list_cintre')
                        </div> 
                        <p class="pl-4">
                            {{ __('sidebar.more-details-vouchers-1') }}
                        </p>
                    </li>
                    <li class="flex mb-5">
                        <div class="pt-2">
                            @svg('list_cintre')
                        </div> 
                        <p class="pl-4">
                            {{ __('sidebar.more-details-vouchers-2') }}
                        </p>
                    </li>
                    <li class="flex mb-5">
                        <div class="pt-2">
                            @svg('list_cintre')
                        </div> 
                        <p class="pl-4">
                            {{ __('sidebar.more-details-vouchers-3') }}
                        </p>
                    </li>
                </ul>
            @endif
        </div>
    @endif
</div>
