<a href="#" class="block article-overview">
    <div class="article-overview__cap article-overview__cap--red"></div>
    <div class="article-overview__img-container">
        @foreach($pictures as $picture)
            <img src="{{ asset('images/pictures/articles/'.$picture->file_name) }}" @if($loop->index > 0) style="display: none;" @endif>
        @endforeach
        @if($pictures->count() > 1)
            <div class="slider-arrow slider-arrow--color-2 slider-arrow--left article-arrow-left">
                <i class="fas fa-chevron-left"></i>
            </div>
            <div class="slider-arrow slider-arrow--color-2 slider-arrow--right article-arrow-right">
                <i class="fas fa-chevron-right"></i>
            </div>
        @endif
    </div>
    <div class="article-overview__footer">
        <div class="flex justify-between">
            <p class="article-overview__footer__size">
                {{ $article->size->value }}
            </p>
            <div class="color-circle color-circle--{{ $article->color->name }}"></div>
        </div>
        <p class="article-overview__footer__category">
            {{ $localized_creation_category }}
        </p>
        <p class="article-overview__footer__name">
            {{ $article->name }}
        </p>
        <div class="flex justify-between">
            <p class="article-overview__footer__price">
                {{ $article->creation->price }}&euro;
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