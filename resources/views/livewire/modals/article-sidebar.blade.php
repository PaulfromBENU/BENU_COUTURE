<div class="article-sidebar flex justify-right">
    @if($article_id != '0')
        <div class="article-sidebar__img-container">

            @if($article->creation->partner != null)
            <div class="model-overview__img-container__partner-icon">
                <div class="model-overview__img-container__partner-icon__content flex justify-between">
                    <div>
                        <p class="primary-color pl-2 pr-2 text-sm">
                            <strong>{{ $article->creation->partner->name }}</strong>
                        </p>
                        <p class="pl-2 pr-2 text-sm">
                            <em>{{ __('components.partner') }}</em>
                        </p>
                    </div>
                    <div>
                        @svg('icon_partenaire')
                    </div>
                </div>
            </div>
            @endif

            <div style="height: 100%;">
            @foreach($article_pictures as $picture)
                <img src="{{ asset('images/pictures/articles/'.$picture) }}" alt="Photo article {{ $article->creation->name }}" class="w-full">
            @endforeach
            </div>

            @if(count($article_pictures) > 1)
            <div class="article-sidebar__img-container__scroller flex justify-between">
                <p>{{ __('sidebar.see-pictures') }}</p>
                <p>
                    @svg('model_arrow_down')
                </p>
            </div>
            @endif
        </div>
        <div class="article-sidebar__content">

            <div class="article-sidebar__content__close-container" wire:click="closeSideBar">
                <div class="article-sidebar__content__close">
                    {{ __('sidebar.close') }} <span class="pl-2">&#10005;</span>
                </div>
            </div>
            <p class="article-sidebar__content__compo__subtitle" wire:click="switchDisplay('overview')" @if($content == 'overview') style="display: none;" @endif>
                < {{ __('sidebar.back') }}
            </p>

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

                @if($sold == 0)
                <div class="article-sidebar__content__size">
                    {{ __('sidebar.size') }} {{ strtoupper($article->size->value) }}
                </div>
                @else
                <div class="article-sidebar__content__size article-sidebar__content__size--sold">
                    {{ __('sidebar.size') }} {{ strtoupper($article->size->value) }}
                </div>
                @endif

                <h2 class="article-sidebar__content__title">
                    {{ strtoupper($article->name) }}
                    @if($article->available_shops()->where('filter_key', '<>', "benu-esch")->count() > 0)
                        &nbsp;- {{ $article->available_shops()->where('filter_key', '<>', "benu-esch")->first()->name }}
                    @endif
                </h2>

                <p class="article-sidebar__content__price">
                    @if($sold == 0)
                    {{ $article->creation->price }}&euro;
                    @else
                    {{ strtoupper(__('models.sold-sold')) }}
                    @endif
                </p>

                <div class="article-sidebar__content__color color-circle color-circle--{{ $article->color->name }}"></div>

                <p class="article-sidebar__content__desc">
                    @if($full_desc == 0)
                    {{ $article_description_short }} 
                    @if(str_word_count($article_description) >= 20)
                        <span class="primary-color" style="cursor: pointer;" wire:click="showFullDescription">+</span>
                    @endif
                    @else
                    {{ $article_description }}
                    @endif
                </p>

                @if($article->$singularity_query != "")
                <p class="article-sidebar__content__singularity">
                    <span class="primary-color">{!! __('sidebar.singularity') !!}</span> {{ $article->$singularity_query }}
                </p>
                @endif

                @if($sold == 0)
                    @if($sent_to_cart == 0)
                    <button class="btn-couture-plain article-sidebar__content__cart-btn" wire:click="addToCart">{{ __('sidebar.add-to-cart') }}</button>
                    @else
                    <div class="text-green-700 p-3 bg-green-200 mb-5 text-center">
                        {{ __('vouchers.sent-to-cart') }}
                    </div>
                    @endif
                @else
                    <button class="btn-couture-plain article-sidebar__content__cart-btn" style="height: auto;">
                        {{ __('sidebar.order-other') }}
                    </button>
                @endif

                <p class="article-sidebar__content__size-check">
                    {!! __('sidebar.size-not-sure') !!} <a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-sizes')]) }}" target="_blank" class="primary-color hover:underline"><strong>{{ __('sidebar.size-guide') }}</strong></a>
                </p>

                <ul class="article-sidebar__content__list">
                    <li class="flex justify-between" wire:click="switchDisplay('composition')">
                        <p>{{ __('sidebar.composition') }}</p> @svg('chevron-down')
                    </li>
                    <li class="flex justify-between" wire:click="switchDisplay('care')">
                        <p>{{ __('sidebar.care') }}</p> @svg('chevron-down')
                    </li>
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
             
            @elseif($content == 'composition')
                <h3 class="article-sidebar__content__compo__title">
                    {{ __('sidebar.composition') }}
                </h3>

                <h5 class="article-sidebar__content__compo__title-expl">{!! __('sidebar.composition-title') !!}</h5>

                <ul class="article-sidebar__content__compo__list">
                    @foreach($article->compositions as $composition)
                    <li>
                        <img src="{{ asset('images/pictures/composition/'.$composition->picture) }}">
                        <h5>
                            {{ ucfirst($composition->$fabric_query) }} <span class="article-sidebar__content__compo__detail">- {{ $composition->$explanation_query }}</span>
                        </h5>
                        <p>
                            <!-- {{ $composition->$explanation_query }} -->
                        </p>
                    </li>
                    @endforeach
                </ul>
            @elseif($content == 'care')
                <h3 class="article-sidebar__content__compo__title">
                    {{ __('sidebar.care') }}
                </h3>

                <h5 class="article-sidebar__content__compo__title-expl">
                    {!! __('sidebar.care-title') !!} <a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-care')]) }}">{!! __('sidebar.care-title-link') !!}</a>
                </h5>

                <ul class="article-sidebar__content__care__list">
                    @foreach($article->care_recommendations as $recommendation)
                    <li class="flex mb-3">
                        @svg('care/'.$recommendation->picture)
                        <p>
                            {{ $recommendation->$desc_query }}
                        </p>
                    </li>
                    @endforeach
                </ul>

            @elseif($content == 'delivery')
            <p>Contenu à confirmer</p>

            @elseif($content == 'more')
                <h3 class="article-sidebar__content__compo__title">
                    {{ __('sidebar.more-details') }}
                </h3>

                <h5 class="article-sidebar__content__compo__title-expl mb-10">{!! __('sidebar.more-details-title') !!}</h5>

                <ul class="article-sidebar__content__more__list">
                    @foreach($article->creation->keywords as $keyword)
                        <li class="flex mb-5">
                            <div class="pt-2">
                                @svg('list_cintre')
                            </div> 
                            <p class="pl-4">
                                {{ $keyword->$keyword_query }}
                            </p>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif
</div>
