<div class="article-overview-wishlist" wire:click="triggerSideBar">
    <div class="article-overview-wishlist__cap article-overview-wishlist__cap--red"></div>
    <div class="flex justify-start">
        <div class="article-overview-wishlist__img-container">
            @if($is_pop_up == 1)
            <div class="article-overview-wishlist__img-container__partner-icon">
                <div class="article-overview-wishlist__img-container__partner-icon__content flex justify-between">
                    <div class="flex flex-col justify-center">
                        <p class="pl-2 pr-2 text-sm">
                            <em>{{ __('components.other-shop') }}</em>
                        </p>
                    </div>
                    <div>
                        @svg('icon_pop_up_store')
                    </div>
                </div>
            </div>
            @endif
            <img src="{{ asset('images/pictures/articles/'.$pictures[$current_picture_index]) }}" alt="Model {{ $article->creation->name }}">
            @if($pictures->count() > 1)
                <div class="slider-arrow slider-arrow--color-2 slider-arrow--left" wire:click.prevent.stop="changePicture('left')">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="slider-arrow slider-arrow--color-2 slider-arrow--right" wire:click.prevent.stop="changePicture('right')">
                    <i class="fas fa-chevron-right"></i>
                </div>
            @endif
        </div>

        <div class="article-overview-wishlist__footer">
            <div class="flex justify-between">
                <p class="article-overview-wishlist__footer__size">
                    {{ $article->size->value }}
                </p>
                @auth
                <div class="article-overview-wishlist__footer__heart" wire:click.prevent.stop="toggleWishlist">
                    @if(!$is_wishlisted)
                    <div class="article-overview-wishlist__footer__heart__icon">
                        <i class="far fa-heart"></i>
                    </div>
                    <div class="article-overview-wishlist__footer__heart__icon article-overview-wishlist__footer__heart__icon--hovered">
                        <i class="fas fa-heart"></i>
                    </div>
                    @else
                    <div class="article-overview-wishlist__footer__heart__icon article-overview-wishlist__footer__heart__icon--active">
                        <i class="fas fa-heart"></i>
                    </div>
                    @endif
                </div>
                @else
                <div class="article-overview-wishlist__footer__heart">
                    <div class="article-overview-wishlist__footer__heart__icon" style="color: grey;">
                        <i class="far fa-heart"></i>
                    </div>
                </div>
                @endauth
            </div>
            <p class="article-overview-wishlist__footer__category">
                {{ $localized_creation_category }}
            </p>
            <p class="article-overview-wishlist__footer__name">
                {{ strtoupper($article->name) }}
            </p>
            <div class="flex justify-between">
                <p class="article-overview-wishlist__footer__price">
                    {{ $article->creation->price }}&euro;
                </p>
            </div>
            <div>
                <button class="btn-couture-plain btn-couture-plain--dark-hover article-overview-wishlist__footer__btn">{{ __('sidebar.add-to-cart') }}</button>
            </div>
        </div>
    </div>
</div>