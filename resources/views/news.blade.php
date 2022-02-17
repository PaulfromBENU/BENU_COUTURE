@extends('layouts.base_layout')

@section('title')
	{{ __('news.all-seo-title') }}
@endsection

@section('description')
	{{ __('news.all-seo-desc') }}
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs pattern-bg">
		<div class="benu-container breadcrumbs__content flex justify-start">
			<a href="{{ route('home', [app()->getLocale()]) }}">{{ __('breadcrumbs.home') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('news-'.app()->getLocale()) }}" class="primary-color"><strong>{{ __('breadcrumbs.news') }}</strong></a>
		</div>
	</div>
@endsection

@section('main-content')
	<div class="text-center all-news w-1/2 m-auto">
		<h4 class="all-news__subtitle">{{ __('news.all-subtitle') }}</h4>
		<h2 class="all-news__title">{{ __('news.all-title') }}</h2>

		<div>
			@for($i = 1; $i <= 5; $i++)
			<a href="{{ route('news-'.app()->getLocale(), ['slug' => 'premier-article-benu-couture']) }}" class="all-news__link">
				Titre de l'actualité {{ $i }}
			</a>
			@endfor
		</div>
	</div>
@endsection

@section('scripts')

@endsection