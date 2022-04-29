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

		<div class="flex justify-start flex-wrap mb-10">
			@php
			$localized_tag_1 = "tag_1_".app()->getLocale();
			$localized_tag_2 = "tag_2_".app()->getLocale();
			$localized_title = "title_".app()->getLocale();
			$localized_slug = "slug_".app()->getLocale();
			$localized_summary = "summary_".app()->getLocale();
			@endphp
			@if($all_news->count() == 0)
			<p class="text-xl text-center w-full">
				<em>{{ __('news.no-news-for-the-moment') }}</em>
			</p>
			@endif
			@foreach($all_news as $news)
			<a href="{{ route('news-'.app()->getLocale(), ['slug' => $news->$localized_slug]) }}" class="all-news__link">
				<div class="all-news__link__img-container">
					<img src="{{ asset('images/pictures/news/'.$news->main_photo) }}" alt="Photo news" title="Photo news">
				</div>
				<div class="all-news__link__tags flex justify-start">
					@if($news->$localized_tag_1 !== '' && $news->$localized_tag_1 !== null)
					<div class="all-news__link__tags__tag">
						{{ $news->$localized_tag_1 }}
					</div>
					@endif
					@if($news->$localized_tag_2 !== '' && $news->$localized_tag_2 !== null)
					<div class="all-news__link__tags__tag">
						{{ $news->$localized_tag_2 }}
					</div>
					@endif
				</div>
				<h3 class="all-news__link__title">
					{{ $news->$localized_title }}
				</h3>
				<p class="all-news__link__date">
					{{ $news->created_at->format('d\/m\/Y') }}
				</p>
				<p class="all-news__link__summary">
					{{ $news->$localized_summary }}
				</p>
			</a>
			@endforeach
		</div>
	</div>
@endsection

@section('scripts')

@endsection