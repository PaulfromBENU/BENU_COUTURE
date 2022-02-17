@extends('layouts.base_layout')

@section('title')
	{{ __('models.seo-title', ['name' => $model->name]) }}
@endsection

@section('description')
	{{ __('models.seo-description') }}
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs pattern-bg">
		<div class="benu-container breadcrumbs__content flex justify-start">
			<a href="{{ route('home', [app()->getLocale()]) }}">{{ __('breadcrumbs.home') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('model-'.app()->getLocale()) }}">{{ __('breadcrumbs.models') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('model-'.app()->getLocale(), ['name' => $model->name]) }}" class="primary-color"><strong>{{ __('breadcrumbs.model') }} {{ $model->name }}</strong></a>
		</div>
	</div>
@endsection

@section('main-content')
	@include('includes.model.model_details')
	@include('includes.model.model_articles')
	@if($sold_articles->count() > 0)
		@include('includes.model.model_sold')
	@endif
	@include('includes.model.model_request')
@endsection

@section('scripts')
<script type="text/javascript">
	$(function() {
		$('.article-overview__footer__heart').on('click', function(e) {
			e.preventDefault();
		})
	});
</script>
@endsection