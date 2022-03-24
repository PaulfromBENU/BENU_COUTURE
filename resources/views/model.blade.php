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
			@if($model->is_accessory == 1)
				<a href="{{ route('model-'.app()->getLocale(), ['family' => 'accessories']) }}">{{ __('breadcrumbs.models') }}</a>
			@elseif($model->creation_groups()->where('filter_key', 'home')->count() > 0)
				<a href="{{ route('model-'.app()->getLocale(), ['family' => 'home']) }}">{{ __('breadcrumbs.models') }}</a>
			@else
				<a href="{{ route('model-'.app()->getLocale()) }}">{{ __('breadcrumbs.models') }}</a>
			@endif
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('model-'.app()->getLocale(), ['name' => $model->name]) }}" class="primary-color"><strong>{{ __('breadcrumbs.model') }} {{ $model->name }}</strong></a>
		</div>
	</div>
@endsection

@section('main-content')
	@include('includes.model.model_details')
	@if($model->product_type != "3")
		@include('includes.model.model_articles')
		@if($sold_articles->count() > 0)
			@include('includes.model.model_sold')
		@endif
	@endif
	@include('includes.model.model_request')
@endsection

@section('side_modal')
	@if($model->product_type == 0)
		@livewire('modals.article-sidebar', ['article_id' => '0'])
	@elseif($model->product_type == 1)
		@livewire('modals.article-sidebar', ['article_id' => '0'])
		@livewire('modals.mask-sidebar', ['creation_id' => $model->id, 'pictures' => $model_pictures, 'age' => 'kid'])
	@elseif($model->product_type == 2)
		@livewire('modals.article-sidebar', ['article_id' => '0'])
		@livewire('modals.mask-sidebar', ['creation_id' => $model->id, 'pictures' => $model_pictures, 'age' => 'adult'])
	@elseif($model->product_type == 3)
		@livewire('modals.article-sidebar', ['article_id' => '0'])
		@livewire('modals.small-items-sidebar', ['creation_id' => $model->id, 'pictures' => $model_pictures])
	@else
		@livewire('modals.small-items-sidebar', ['article_id' => '0'])
	@endif
@endsection

@section('scripts')

@endsection