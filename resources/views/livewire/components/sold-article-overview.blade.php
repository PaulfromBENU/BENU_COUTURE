<a href="#" class="block sold-overview">
    <div class="sold-overview__cap sold-overview__cap--grey"></div>
    <div class="sold-overview__img-container">
        <img src="{{ asset('images/pictures/articles/modele_2.png') }}">
        <img src="{{ asset('images/pictures/articles/modele_3.png') }}" style="display: none;">
        <img src="{{ asset('images/pictures/articles/modele_4.png') }}" style="display: none;">
        <img src="{{ asset('images/pictures/articles/modele_5.png') }}" style="display: none;">
        <div class="slider-arrow slider-arrow--color-2 slider-arrow--left article-arrow-left">
            <i class="fas fa-chevron-left"></i>
        </div>
        <div class="slider-arrow slider-arrow--color-2 slider-arrow--right article-arrow-right">
            <i class="fas fa-chevron-right"></i>
        </div>
    </div>
    <div class="sold-overview__footer">
        <div class="flex justify-between">
            <p class="sold-overview__footer__size">
                {{ $article->size->value }}
            </p>
            <div class="color-circle color-circle--green"></div>
        </div>
        <p class="sold-overview__footer__category">
            {{ $localized_creation_category }}
        </p>
        <p class="sold-overview__footer__name">
            {{ $article->name }}
        </p>
        <div class="flex justify-between">
            <p class="sold-overview__footer__price">
                VENDU
            </p>
            @auth
            <div class="article-overview__footer__heart" wire:click="toggleWishlist">
                <div class="article-overview__footer__heart__icon">
                    <i class="far fa-heart"></i>
                </div>
                <div class="article-overview__footer__heart__icon article-overview__footer__heart__icon--hovered">
                    <i class="fas fa-heart"></i>
                </div>
            </div>
            @else
            <div class="article-overview__footer__heart">
                <div class="article-overview__footer__heart__icon" style="color: grey;">
                    <i class="far fa-heart"></i>
                </div>
            </div>
            @endauth
        </div>
    </div>
</a>