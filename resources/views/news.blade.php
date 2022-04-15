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
	<div class="text-center all-news w-2/3 m-auto">
		<h4 class="all-news__subtitle">{{ __('news.all-subtitle') }}</h4>
		<h2 class="all-news__title">{{ __('news.all-title') }}</h2>

		<div class="flex justify-start flex-wrap">
			@for($i = 1; $i <= 5; $i++)
			<a href="{{ route('news-'.app()->getLocale(), ['slug' => 'premier-article-benu-couture']) }}" class="all-news__link">
				<div class="all-news__link__img-container">
					<img src="{{ asset('images/pictures/news/image_trees.png') }}" alt="Photo news" title="Photo news">
				</div>
				<div class="all-news__link__tags flex justify-start">
					@for($j = 1; $j <= 2; $j++)
					<div class="all-news__link__tags__tag">
						Tag line {{ $j }}
					</div>
					@endfor
				</div>
				<h3 class="all-news__link__title">
					Titre de l'actualité {{ $i }}
				</h3>
				<p class="all-news__link__date">
					15 avril 2021
				</p>
				<p class="all-news__link__summary">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
				</p>
			</a>
			@endfor
		</div>
	</div>
@endsection

@section('scripts')

@endsection