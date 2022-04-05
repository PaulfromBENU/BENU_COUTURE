<div class="article-overview" wire:click="triggerSideBar">
    <div class="article-overview__cap article-overview__cap--red"></div>
    <div class="article-overview__img-container">
        @if($is_pop_up == 1)
        <div class="article-overview__img-container__partner-icon">
            <div class="article-overview__img-container__partner-icon__content flex justify-between">
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
    <div class="article-overview__footer">
        <div class="flex justify-between">
            <p class="article-overview__footer__size">
                {{ $article->size->value }}
            </p>
            @if($article->color->name == 'multicolored')
                <div class="color-circle">
                    <img src="{{ asset('images/pictures/multicolor.png') }}">
                </div>
            @else
                <div class="color-circle color-circle--{{ $article->color->name }}"></div>
            @endif
        </div>
        <p class="article-overview__footer__category">
            {{ $localized_creation_category }}
        </p>
        <p class="article-overview__footer__name">
            {{ strtoupper($article->name) }}
        </p>
        <div class="flex justify-between">
            <p class="article-overview__footer__price">
                {{ $article->creation->price }}&euro;
            </p>
            @auth
            <div class="article-overview__footer__heart" wire:click.prevent.stop="toggleWishlist">
                @if(!$is_wishlisted)
                <div class="article-overview__footer__heart__icon">
                    <i class="far fa-heart"></i>
                </div>
                <div class="article-overview__footer__heart__icon article-overview__footer__heart__icon--hovered">
                    <i class="fas fa-heart"></i>
                </div>
                @else
                <div class="article-overview__footer__heart__icon article-overview__footer__heart__icon--active">
                    <i class="fas fa-heart"></i>
                </div>
                @endif
            </div>
            @else
            <div class="article-overview__footer__heart tooltip" wire:click.prevent.stop="toggleWishlist">
                <div class="article-overview__footer__heart__icon">
                    <i class="far fa-heart"></i>
                </div>
                <div class="article-overview__footer__heart__icon article-overview__footer__heart__icon--hovered">
                    <i class="fas fa-heart"></i>
                </div>
                <span class="tooltiptext tooltiptext--left">
                    {!! __('models.please-login') !!}
                </span>
            </div>
            @endauth
        </div>
    </div>
</div>