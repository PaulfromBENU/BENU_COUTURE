<div>
    <div class="all-models__filters-container">
        <div class="all-models__filters flex justify-between benu-container">
            <div class="flex justify-start">
                <div class="all-models__filters__filter flex" id="filter-family">
                    <p>{{ __('models.filter-family') }}</p> <img src="{{ asset('images/pictures/chevron_bottom.png') }}">
                </div>
                @if($family !== 'home')
                    <div class="all-models__filters__filter flex" id="filter-category">
                        <p>{{ __('models.filter-category') }}</p> <img src="{{ asset('images/pictures/chevron_bottom.png') }}">
                    </div>
                    <div class="all-models__filters__filter flex" id="filter-gender">
                        <p>{{ __('models.filter-type') }}</p> <img src="{{ asset('images/pictures/chevron_bottom.png') }}">
                    </div>
                @endif
                <div class="all-models__filters__filter flex" id="filter-color">
                    <p>{{ __('models.filter-color') }}</p> <img src="{{ asset('images/pictures/chevron_bottom.png') }}">
                </div>
                <div class="all-models__filters__filter flex" id="filter-price">
                    <p>{{ __('models.filter-price') }}</p> <img src="{{ asset('images/pictures/chevron_bottom.png') }}">
                </div>
                @if(count($active_filters['partners']) > 0)
                <div class="all-models__filters__filter flex" id="filter-partners">
                    <p>{{ __('models.filter-partner') }}</p> <img src="{{ asset('images/pictures/chevron_bottom.png') }}">
                </div>
                @endif
                <div class="all-models__filters__filter flex" id="filter-shops">
                    <p>{{ __('models.filter-shop') }}</p> <img src="{{ asset('images/pictures/chevron_bottom.png') }}">
                </div>
            </div>

            <div class="all-models__filters__filter flex" style="margin-right: 5px;" id="filter-order">
                <p>{{ __('models.filter-order-by') }}</p> <img src="{{ asset('images/pictures/chevron_bottom.png') }}">
            </div>
        </div>

        @include('includes.model.model_filters')
    </div>

    <div class="all-models__active-filters flex justify-start flex-wrap benu-container" wire:key="active-filters">
        <!-- <div>
            <div class="all-models__active-filters__filter flex justify-between">
                <p class="w-4/5 pr-1" style="min-width: fit-content;">{{ $filter_names['families'][$family] }}</p>
                <div class="w-1/5">&#x2715;</div>
            </div>
        </div> -->

        @foreach($active_filters['categories'] as $category => $category_filter)
            <div wire:click="toggleFilter('categories', '{{ $category }}')" wire:key="{{ $category }}">
            @if($category_filter == '1')
                <div class="all-models__active-filters__filter flex justify-between">
                    <p class="w-4/5 pr-1" style="min-width: fit-content;">{{ $filter_names['categories'][$category] }}</p>
                    <div class="w-1/5">&#x2715;</div>
                </div>
            @endif
            </div>
        @endforeach

        @foreach($active_filters['colors'] as $color => $color_filter)
            <div wire:click="toggleFilter('colors', '{{ $color }}')" wire:key="{{ $color }}">
            @if($color_filter == '1')
                <div class="all-models__active-filters__filter flex justify-between">
                    <div class="color-circle color-circle--{{ $color }} w-1/5"></div>
                    <p class="w-3/5 pl-1">{{ $filter_names['colors'][$color] }}</p>
                    <div class="w-1/5">&#x2715;</div>
                </div>
            @endif
            </div>
        @endforeach

        @foreach($active_filters['types'] as $type => $type_filter)
            <div wire:click="toggleFilter('types', '{{ $type }}')" wire:key="{{ $type }}">
            @if($type_filter == '1')
                <div class="all-models__active-filters__filter flex justify-between">
                    <p class="w-4/5 pr-1" style="min-width: fit-content;">{{ $filter_names['types'][$type] }}</p>
                    <div class="w-1/5">&#x2715;</div>
                </div>
            @endif
            </div>
        @endforeach

        @foreach($active_filters['prices'] as $price => $price_filter)
            <div wire:click="toggleFilter('prices', '{{ $price }}')" wire:key="{{ $price }}">
            @if($price_filter == '1')
                <div class="all-models__active-filters__filter flex justify-between">
                    <p class="w-4/5 pr-1" style="min-width: fit-content;">{!! $filter_names['prices'][$price] !!}</p>
                    <div class="w-1/5">&#x2715;</div>
                </div>
            @endif
            </div>
        @endforeach

        @foreach($active_filters['partners'] as $partner => $partner_filter)
            <div wire:click="toggleFilter('partners', '{{ $partner }}')" wire:key="{{ $partner }}">
            @if($partner_filter == '1')
                <div class="all-models__active-filters__filter flex justify-between">
                    <p class="w-4/5 pr-1" style="min-width: fit-content;">{{ $filter_names['partners'][$partner] }}</p>
                    <div class="w-1/5">&#x2715;</div>
                </div>
            @endif
            </div>
        @endforeach

        @foreach($active_filters['shops'] as $shop => $shop_filter)
            <div wire:click="toggleFilter('shops', '{{ $shop }}')" wire:key="{{ $shop }}">
            @if($shop_filter == '1')
                <div class="all-models__active-filters__filter flex justify-between">
                    <p class="w-4/5 pr-1" style="min-width: fit-content;">{{ $filter_names['shops'][$shop] }}</p>
                    <div class="w-1/5">&#x2715;</div>
                </div>
            @endif
            </div>
        @endforeach
    </div>
</div>