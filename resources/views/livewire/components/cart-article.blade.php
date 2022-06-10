<div class="grid grid-cols-8 cart-content__article">
    <a target="_blank" href="{{ route('model-'.app()->getLocale(), ['name' => strtolower($article->creation->name), 'article' => strtolower($article->name)]) }}" class="block col-span-1 cart-content__article__img-container">
        @if($article->name == 'voucher')
        <img src="{{ asset('images/pictures/vouchers_img.png') }}" alt="BENU vouchers" title="BENU Vouchers" />
        @elseif($article->photos()->where('is_front', '1')->count() > 0)
        <img src="{{ asset('images/pictures/articles/'.$article->photos()->where('is_front', '1')->first()->file_name) }}">
        @else
        <img src="{{ asset('images/pictures/articles/'.$article->photos()->first()->file_name) }}">
        @endif
    </a>
    <div class="col-span-2 cart-content__article__name">
        @if($article->name == 'voucher')
        <h4>{{ __('cart.voucher') }} ({{ $article->carts()->where('carts.cart_id', session('cart_id'))->first()->pivot->value }}&euro;)</h4>
        @else
        <h4>{{ strtoupper($article->name) }}</h4>
        @endif
        @if($article->pending_shops()->where('filter_key', '<>', 'benu-esch')->count() > 0)
        <button class=" mt-1 rounded-2xl bg-red-100 primary-color text-md pt-1 pb-1 pl-3 pr-3 hover:text-white hover:bg-gray-800 transition absolute" wire:click="showInfoModal">
            {{ __('cart.in-pop-up-store') }} +
        </button>
        @endif
        @if($has_extra_option)
        <div class="mt-2 text-md font-normal flex">
            <input type="checkbox" class="rounded mr-2" name="with_extra_option" wire:model="with_extra_option" style="margin-top: 5px;" id="with_extra_option_{{ $article->id }}">
            <label for="with_extra_option_{{ $article->id }}">{{ __('cart.with-extra-pillow') }} : <span class="primary-color font-bold">
                @if(session('has_kulturpass') !== null)
                +&nbsp;5&euro;</span></label>
                @else
                +&nbsp;10&euro;</span></label>
                @endif
        </div>
        @endif
        <div class="flex cart-content__article__name__checkbox">
            <input type="checkbox" name="article_cart_gift" id="article-cart-{{ $article->id }}" wire:model="is_gift">
            <label for="article-cart-{{ $article->id }}" class="pl-2 @if($is_gift) primary-color @endif">{{ __('cart.article-is-gift') }}</label>
            @if($is_gift)
                @svg('icon_gift', 'cart-content__article__name__checkbox__svg-active')
            @else
                @svg('icon_gift')
            @endif
        </div>
    </div>
    <div>
        <div class="cart-content__article__size">
            @if($article->name == 'voucher')
                @if($article->voucher_type == 'pdf')
                    PDF
                @else
                    {{ __('vouchers.fabric') }}
                @endif
            @else
                @if($article->size->value == 'unique')
                {{ __('components.unique-size') }}
                @else
                {{ $article->size->value }}
                @endif
            @endif
        </div>
    </div>
    <div>
        @if($article->name == 'voucher')
        <div class="cart-content__article__color">
            
        </div>
        @elseif($article->color->name == 'multicolored')
        <div class="cart-content__article__color">
            <img src="{{ asset('images/pictures/multicolor.png') }}">
        </div>
        @else
        <div class="cart-content__article__color" style="background: {{ $article->color->hex_code }}"></div>
        @endif
    </div>
    <div>
        <div class="cart-content__article__number flex">
            x{{ $number }}
            @if($max_number > 1)
            <div class="ml-3 mt-3">
                <p class="article-sidebar__content__mask-btn" wire:click="updateNumber('up')">
                    <i class="fas fa-plus"></i>
                </p>
                <p class="article-sidebar__content__mask-btn" wire:click="updateNumber('down')">
                    <i class="fas fa-minus"></i>
                </p>
            </div>
            @endif
        </div>
    </div>
    <div>
        <div class="cart-content__article__price">
            @if($article->name == 'voucher')
                @if(session('has_kulturpass') !== null)
                    {{ round($article->carts()->where('carts.cart_id', session('cart_id'))->first()->pivot->value / 2, 2) }}&euro;
                @else
                    {{ $article->carts()->where('carts.cart_id', session('cart_id'))->first()->pivot->value }}&euro;
                @endif
            @else
                @if($article->is_extra_accessory)
                    @if(session('has_kulturpass') !== null)
                        {{ round($article->specific_price / 2, 2) }}&euro;
                    @else
                        {{ $article->specific_price }}&euro;
                    @endif
                @else
                    @if(session('has_kulturpass') !== null)
                        {{ round($article->creation->price / 2, 2) }}&euro;
                    @else
                        {{ $article->creation->price }}&euro;
                    @endif
                @endif
            @endif

            @if($gift_price > 0)
            <p class="primary-color text-right pr-5" style="margin-top: 50px;">
                @if(session('has_kulturpass') !== null)
                + {{ $gift_price / 2 }}&euro;
                @else
                + {{ $gift_price }}&euro;
                @endif
            </p>
            @endif
        </div>
    </div>
    <div>
        <div class="flex justify-end cart-content__article__icons">
            @auth
            <div class="cart-content__article__icons__heart" wire:click.prevent.stop="toggleWishlist">
                @if(!$is_wishlisted)
                <div class="cart-content__article__icons__heart__icon">
                    <i class="far fa-heart"></i>
                </div>
                <div class="cart-content__article__icons__heart__icon cart-content__article__icons__heart__icon--hovered">
                    <i class="fas fa-heart"></i>
                </div>
                @else
                <div class="cart-content__article__icons__heart__icon cart-content__article__icons__heart__icon--active">
                    <i class="fas fa-heart"></i>
                </div>
                @endif
            </div>
            @else
            <div class="cart-content__article__icons__heart tooltip" wire:click.prevent.stop="toggleWishlist">
                <div class="cart-content__article__icons__heart__icon">
                    <i class="far fa-heart"></i>
                </div>
                <div class="cart-content__article__icons__heart__icon cart-content__article__icons__heart__icon--hovered">
                    <i class="fas fa-heart"></i>
                </div>
                <span class="tooltiptext tooltiptext--top">
                    {!! __('models.please-login') !!}
                </span>
            </div>
            @endauth
            <div class="cart-content__article__icons__trash" wire:click="removeItem">
                @svg('icon_trash')
            </div>
        </div>
    </div>
</div>
