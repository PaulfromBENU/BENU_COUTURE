@extends('layouts.base_layout')

@section('title')
	Toutes les actualités de BENU COUTURE
@endsection

@section('description')
	Restez au courant de toutes les actualités de BENU COUTURE en lisant nos articles, mis à jour régulièrement.
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs pattern-bg">
		<div class="benu-container breadcrumbs__content flex justify-start">
			<a href="{{ route('home', [app()->getLocale()]) }}">{{ __('breadcrumbs.home') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('news', ['locale' => app()->getLocale()]) }}" class="primary-color"><strong>{{ __('breadcrumbs.news') }}</strong></a>
		</div>
	</div>
@endsection

@section('main-content')
	<div class="text-center all-news w-1/2 m-auto">
		<h4 class="all-news__subtitle">Nos campagnes</h4>
		<h2 class="all-news__title">Toutes les actualités</h2>

		<div>
			@for($i = 1; $i <= 5; $i++)
			<a href="{{ route('news', ['locale' => app()->getLocale(), 'slug' => 'premier-article-benu-couture']) }}" class="all-news__link">
				Titre de l'actualité {{ $i }}
			</a>
			@endfor
		</div>
	</div>
@endsection

@section('scripts')

@endsection