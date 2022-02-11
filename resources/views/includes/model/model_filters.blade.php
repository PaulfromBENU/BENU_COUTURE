<div class="all-models__filters-container__options" style="display: none;">
	<div class="benu-container" id="filters-category" style="display: none;">
		<div class="flex justify-start flex-wrap pt-4 pb-4">
			@foreach($active_filters['categories'] as $category => $filter)
			<div wire:click="toggleFilter('categories', '{{ $category }}')"  wire:key="{{ $category }}">
				@if($filter == 1)
					<div class="all-models__filter-tag all-models__filter-tag--active">
				@else
					<div class="all-models__filter-tag">
				@endif
					{{ $filter_names['categories'][$category] }}
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

	<div class="benu-container" id="filters-gender" style="display: none;">
		<div class="flex justify-start flex-wrap pt-4 pb-4">
			@foreach($active_filters['types'] as $type => $filter)
			<div wire:click="toggleFilter('types', '{{ $type }}')" wire:key="{{ $type }}">
				@if($filter == 1)
					<div class="all-models__filter-tag all-models__filter-tag--active">
				@else
					<div class="all-models__filter-tag">
				@endif
					{{ $filter_names['types'][$type] }}
				</div>
			</div>
			@endforeach
		</div>
	</div>

	<div class="benu-container" id="filters-price" style="display: none;">
		<div class="flex justify-start flex-wrap pt-4 pb-4">
			@foreach($active_filters['prices'] as $price => $filter)
			<div wire:click="toggleFilter('prices', '{{ $price }}')" wire:key="{{ $price }}">
				@if($filter == 1)
					<div class="all-models__filter-tag all-models__filter-tag--active">
				@else
					<div class="all-models__filter-tag">
				@endif
					{!! $filter_names['prices'][$price] !!}
				</div>
			</div>
			@endforeach
		</div>
	</div>

	<div class="benu-container" id="filters-partners" style="display: none;">
		<div class="flex justify-start flex-wrap pt-4 pb-4">
			@foreach($active_filters['partners'] as $partner => $filter)
			<div wire:click="toggleFilter('partners', '{{ $partner }}')" wire:key="{{ $partner }}">
				@if($filter == 1)
					<div class="all-models__filter-tag all-models__filter-tag--active">
				@else
					<div class="all-models__filter-tag">
				@endif
					{{ $filter_names['partners'][$partner] }}
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
<!-- 		<div>
			<button class="btn-couture">Appliquer</button>
		</div> -->
	</div>

	<div class="benu-container" id="filters-order" style="display: none;">
		<div class="flex justify-start flex-wrap pt-4 pb-4">
			<div class="all-models__filter-tag">
				Prix croissant
			</div>
			<div class="all-models__filter-tag">
				Prix décroissant
			</div>
		</div>
	</div>
</div>