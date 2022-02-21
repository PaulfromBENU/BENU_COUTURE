<div class="article-sidebar flex justify-right" style="display: none;">
    @if($article_id != '0')
        <div class="article-sidebar__img-container">
            @foreach($article_pictures as $picture)
                <img src="{{ asset('images/pictures/articles/'.$picture) }}" alt="Photo article {{ $article->creation->name }}" class="w-full">
            @endforeach
        </div>
        <div class="article-sidebar__content">
            @if($content == 'overview')
                <h3 class="article-sidebar__content__subtitle">
                    {{ $article->creation->creation_category->$name_query }}
                </h3>

                @auth
                <div class="article-sidebar__content__wishlist" wire:click="toggleWishlist">
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
                <div class="article-sidebar__content__wishlist">
                    <div class="article-sidebar__content__wishlist__icon" style="color: grey;">
                        <i class="far fa-heart"></i>
                    </div>
                </div>
                @endauth

                <div class="article-sidebar__content__size">
                    Taille {{ strtoupper($article->size->value) }}
                </div>

                <h2 class="article-sidebar__content__title">
                    {{ $article->name }}
                </h2>

                <p class="article-sidebar__content__price">
                    {{ $article->creation->price }}&euro;
                </p>
                
            @elseif($content == 'care')

            @endif
        </div>
    @endif
</div>
