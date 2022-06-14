<div class="benu-container">
    @if($initial_load ==  0)
        <div class="filter-no-result text-center">
            <img src="{{ asset('images/loaders/load-animation-1.gif') }}" class="m-auto">
        </div>
    @elseif($sections_number == 0 || $filtered_models->count() == 0)
        <div class="filter-no-result">
            {{ __('models.filter-no-result') }}
        </div>
    @endif

    <div class="filter-no-result text-center" id="filter-update-loader" style="display: none; margin-bottom: 40px; text-align: center;">
        <img src="{{ asset('images/loaders/loader-square-red.gif') }}" style="height: 70px; margin: auto;" />
        <!-- Mise à jour en cours... -->
    </div>

    <div class="flex flex-wrap justify-start all-models__list" id="filtered-creations">
    @for($j = 0; $j < $sections_number; $j++)
        @foreach($displayed_models[$j] as $model)
            @livewire('components.model-overview', ['model' => $model], key($model->id))
        @endforeach
        
        @if($j == 0 && $sections_number == 2)
            @switch($paginate_page)
                @case(1)
                <div class="all-models__list__separator all-models__list__separator--1">
                @break
                
                @case(2)
                <div class="all-models__list__separator all-models__list__separator--2">
                @break

                @default
                <div class="all-models__list__separator all-models__list__separator--1">
            @endswitch
                <p class="all-models__list__separator__title">
                    @switch($paginate_page)
                        @case(1)
                        {{ __('models.info-1-header') }}
                        @break
                        
                        @case(2)
                        {{ __('models.info-2-header') }}
                        @break

                        @default
                        {{ __('models.info-1-header') }}
                    @endswitch
                </p>
                <p class="all-models__list__separator__subtitle">
                    @switch($paginate_page)
                        @case(1)
                        {{ __('models.info-1-txt') }}
                        @break
                        
                        @case(2)
                        {{ __('models.info-2-txt') }}
                        @break

                        @default
                        {{ __('models.info-1-txt') }}
                    @endswitch
                </p>
            </div>
        @endif
    @endfor
    </div>

    @if($paginate_pages_count > 1)
    <div class="pagination-index flex justify-between">
        <div class="pagination-index__chevron pagination-index__chevron--left" wire:click="changePage('previous')">
            @svg('chevron-down')
        </div>
        @for($index = 1; $index <= $paginate_pages_count; $index ++)
            @if($index == $paginate_page)
                <div class="pagination-index__index pagination-index__index--active" wire:click="changePage({{ $index }})">{{ $index }}</div>
            @else
                <div class="pagination-index__index" wire:click="changePage({{ $index }})">{{ $index }}</div>
            @endif
        @endfor
        <div class="pagination-index__chevron pagination-index__chevron--right" wire:click="changePage('next')">
            @svg('chevron-down')
        </div>
    </div>
    @endif
</div>