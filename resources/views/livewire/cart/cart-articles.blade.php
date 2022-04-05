@if($couture_articles->count() == 0)
<div class="cart-content__articles">
    <p>
        <em>{{ __('cart.no-article-for-the-moment') }}...</em>
    </p>
    <p class="text-center mt-5 pt-5">
        <a href="{{ route('model-'.app()->getLocale()) }}" class="btn-couture">{{ __('welcome.last-link') }}</a>
    </p>
</div>
@else
<div class="cart-content__articles">
    <div class="grid grid-cols-8 cart-content__articles__header">
        <div class="col-span-1">
            {{ __('cart.title-article') }}
        </div>
        <div class="col-span-2">
            
        </div>
        <div>
            {{ __('cart.title-size') }}
        </div>
        <div>
            {{ __('cart.title-color') }}
        </div>
        <div>
            {{ __('cart.title-number') }}
        </div>
        <div class="pl-1">
            {{ __('cart.title-price') }}
        </div>
        <div>
            
        </div>
    </div>

    @foreach($couture_articles as $article)
        @livewire('components.cart-article', ['article_id' => $article->id], key($article->id))
    @endforeach

    <div class="w-full cart-info-box flex justify-between">
        <div class="cart-info-box__block">
            <h5>
                Méthode de livraison
            </h5>
            <div>
                <button class="btn-couture" style="margin: 0;">
                    Estimer tes frais de livraison
                </button>
            </div>
        </div>
        <div class="cart-info-box__block">
            <h5>
                Besoin d'aide ?
            </h5>
            <p>
                Toutes les réponses à tes questions dans notre&nbsp;<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-faq')]) }}">FAQ</a>
            </p>
            <p>
                Tu peux également <a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-contact')]) }}">nous contacter</a>
            </p>
        </div>
    </div>
</div>
@endif
