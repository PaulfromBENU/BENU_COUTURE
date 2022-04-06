<div class="grid grid-cols-8 cart-content__article">
    <div class="col-span-1 cart-content__article__img-container">
        @if($article->name == 'voucher')
        <img src="{{ asset('images/pictures/vouchers_img.png') }}" alt="BENU vouchers" title="BENU Vouchers" />
        @elseif($article->photos()->where('is_front', '1')->count() > 0)
        <img src="{{ asset('images/pictures/articles/'.$article->photos()->where('is_front', '1')->first()->file_name) }}">
        @else
        <img src="{{ asset('images/pictures/articles/'.$article->photos()->first()->file_name) }}">
        @endif
    </div>
    <div class="col-span-2 cart-content__article__name">
        <h4>{{ strtoupper($article->name) }}</h4>
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
                    {{ __('voucher.fabric') }}
                @endif
            @else
            {{ $article->size->value }}
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
                {{ $article->carts()->where('carts.cart_id', session('cart_id'))->first()->pivot->value }}&euro;
            @else
                {{ $article->creation->price }}&euro;
            @endif

            @if($gift_price > 0)
            <p class="primary-color text-right pr-5" style="margin-top: 50px;">
                + {{ $gift_price }}&euro;
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
