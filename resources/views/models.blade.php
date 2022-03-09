@extends('layouts.base_layout')

@section('title')
	{{ __('models.seo-title-all') }}
@endsection

@section('description')
	{{ __('models.seo-description-all') }}
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs pattern-bg">
		<div class="benu-container breadcrumbs__content flex justify-start">
			<a href="{{ route('home', [app()->getLocale()]) }}">{{ __('breadcrumbs.home') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('model-'.app()->getLocale()) }}" class="primary-color"><strong>{{ __('breadcrumbs.models') }}</strong></a>
		</div>
	</div>
@endsection

@section('main-content')
<section class="all-models">
	@livewire('filters.all-models-filter', ['filter_names' => $filter_names, 'initial_filters' => $initial_filters])
	@livewire('filters.filtered-models', ['initial_filters' => $initial_filters])
</section>
@endsection

@section('scripts')
<script type="text/javascript">
	$(function() {
		Livewire.on('filtersUpdated', function() {
			$('#filtered-creations').hide();
			$('#filter-update-loader').show();
		});
	})
</script>
@endsection