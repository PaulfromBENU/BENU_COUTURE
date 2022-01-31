@extends('layouts.base_layout')

@section('title')
	{{ __('models.seo-title', ['name' => 'Caretta']) }}
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
			<a href="{{ route('model', ['locale' => app()->getLocale()]) }}">{{ __('breadcrumbs.models') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('model', ['locale' => app()->getLocale(), 'name' => 'caretta']) }}" class="primary-color"><strong>{{ __('breadcrumbs.model') }} XXXX</strong></a>
		</div>
	</div>
@endsection

@section('main-content')
	@include('includes.model.model_details')
	@include('includes.model.model_articles')
	@include('includes.model.model_sold')
	@include('includes.model.model_request')
@endsection

@section('scripts')
@endsection