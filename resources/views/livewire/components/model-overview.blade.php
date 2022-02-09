<a href="{{ route('model-'.app()->getLocale(), ['name' => strtolower($model->name)]) }}" class="block model-overview">
    <div class="model-overview__header flex justify-between">
        <div>
            <p class="model-overview__header__txt">
                {{ $model_category }}&nbsp;- {{ $available_articles_count }} {!! trans_choice('components.models-header', $available_articles_count) !!}
            </p>
            <div class="flex flex-start">
                @foreach($available_colors as $color)
                <div class="color-circle color-circle--{{ $color->name }}" wire:key={{ $color->id }}></div>
                @endforeach
                <div class="color-circle"></div>
            </div>
        </div>

        <div class="model-overview__header__heart">
        </div>
    </div>
    <div class="model-overview__img-container">
        <img src="{{ asset('images/pictures/articles/'.$pictures[rand(0, 2)]) }}">
    </div>
    <div class="model-overview__footer flex justify-between">
        <p>
            {{ __('components.models-model') }} {{ strtoupper($model->name) }}
        </p>
        <p>
            {{ $model->price }}&euro;
        </p>
    </div>
</a>