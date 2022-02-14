<a href="{{ route('model-'.app()->getLocale(), ['name' => strtolower($model->name)]) }}" class="block model-overview">
    <div class="model-overview__header flex justify-between">
        <div>
            <p class="model-overview__header__txt">
                {{ $model_category }}&nbsp;- {{ $available_articles_count }} {!! trans_choice('components.models-header', $available_articles_count) !!}
            </p>
            <div class="flex flex-start">
                @foreach($available_colors as $color)
                <div class="color-circle color-circle--{{ $color->name }}" wire:key="{{ $color->id }}"></div>
                @endforeach
                <div class="color-circle"></div>
            </div>
        </div>

        <div class="model-overview__header__heart">
        </div>
    </div>
    <div class="model-overview__img-container">
        @if($model->partner != null)
        <div class="model-overview__img-container__partner-icon">
            @svg('icone_partenaire')
        </div>
        @endif
        @foreach($pictures as $picture)
            <img src="{{ asset('images/pictures/articles/'.$picture) }}" wire:key="{{ $picture }}" @if($loop->index > 0) style="display: none;" @endif>
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
    <div class="model-overview__footer flex justify-between">
        <p>
            {{ __('components.models-model') }} {{ strtoupper($model->name) }}
        </p>
        <p>
            {{ $model->price }}&euro;
        </p>
    </div>
</a>