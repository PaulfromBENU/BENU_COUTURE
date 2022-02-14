<div class="all-models__filters-container__options" style="display: none; z-index: 5;">
	<div class="benu-container" id="filters-size" style="display: none;">
		<div class="flex justify-start flex-wrap pt-4 pb-4">
			@foreach($active_filters['sizes'] as $size => $filter)
			<div wire:click="toggleFilter('sizes', '{{ $size }}')"  wire:key="{{ $size }}">
				@if($filter == 1)
					<div class="all-models__filter-tag all-models__filter-tag--active">
				@else
					<div class="all-models__filter-tag">
				@endif
					{{ $filter_names['sizes'][$size] }}
				</div>
			</div>
			@endforeach
		</div>
	</div>

	<div class="benu-container" id="filters-color" style="display: none;">
		<div class="flex justify-start flex-wrap pt-4 pb-4">
			@foreach($active_filters['colors'] as $color => $filter)
			<div wire:click="toggleFilter('colors', '{{ $color }}')" wire:key="{{ $color }}">
				@if($filter == 1)
					<div class="all-models__filter-tag all-models__filter-tag--active flex justify-between">
				@else
					<div class="all-models__filter-tag flex justify-between">
				@endif
					<div class="color-circle color-circle--{{ $color }} w-1/5 mt-1 mr-2"></div>
					<p>{{ $filter_names['colors'][$color] }}</p>
				</div>
			</div>
			@endforeach
		</div>
	</div>

	<div class="benu-container" id="filters-shops" style="display: none;">
		<div class="flex justify-start flex-wrap pt-4 pb-4">
			@foreach($active_filters['shops'] as $shop => $filter)
			<div wire:click="toggleFilter('shops', '{{ $shop }}')" wire:key="{{ $shop }}">
				@if($filter == 1)
					<div class="all-models__filter-tag all-models__filter-tag--active">
				@else
				<div class="all-models__filter-tag">
				@endif
					{{ $filter_names['shops'][$shop] }}
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>