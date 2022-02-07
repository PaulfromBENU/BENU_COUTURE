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
			<a href="{{ route('news-'.app()->getLocale()) }}">{{ __('breadcrumbs.news') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('news-'.app()->getLocale(), ['slug' => 'premier-article-benu-couture']) }}" class="primary-color"><strong>{{ __('breadcrumbs.news-example') }}</strong></a>
		</div>
	</div>
@endsection

@section('main-content')
	<div class="text-center all-news w-1/2 m-auto">
		<h4 class="single-news__subtitle">Janvier 2022</h4>
		<h2 class="single-news__title">Titre de l'actualité 1</h2>

		<p class="single-news__txt">
			Duis tincidunt risus vitae diam molestie laoreet. Fusce commodo purus vitae ante mollis lobortis. Cras commodo suscipit nulla, eu lobortis dui auctor et. In et lacinia augue. Aliquam egestas ultrices ex, at efficitur tellus porta id. Cras id neque enim. Suspendisse blandit erat ligula, eu luctus sapien auctor quis. Pellentesque pellentesque molestie erat. Nulla cursus sit amet enim dictum dapibus. Morbi tincidunt commodo magna vitae ullamcorper. Vivamus eu nisi ac velit ultricies. Maecenas sit amet aliquet odio. Ut id venenatis lectus. Maecenas at vestibulum dui. 
		</p>
		<p class="single-news__txt">
			Vestibulum ultricies at metus quis rhoncus. Pellentesque rhoncus volutpat diam sed posuere. Vivamus mattis consequat lacinia. Cras arcu nisi, eleifend vitae nunc blandit, viverra hendrerit mi. <a href="#" target="_blank">Possibilité de mettre des liens</a> eu pellentesque turpis bibendum. Fusce porta quam gravida malesuada bibendum. Proin dapibus consectetur laoreet. Nullam varius, sem a aliquet tempor, sem eros egestas tortor, nec mattis lectus quam id mauris. Maecenas at facilisis enim, vel convallis magna. Nam non vehicula diam. Fusce porttitor neque eget tellus tempor, eget tincidunt eros finibus. Sed eleifend malesuada nulla, sed rhoncus tellus varius in. Praesent quis tincidunt sapien. Quisque erat lacus, varius fringilla est consectetur, blandit porttitor augue. Phasellus laoreet metus sed tellus accumsan commodo. Phasellus semper enim quam, molestie feugiat nisl elementum eu. 
		</p>
		<p class="single-news__txt">
			Vivamus placerat malesuada leo bibendum maximus. Sed faucibus neque vitae sem ornare, non auctor mi malesuada. Fusce nec dolor et mauris tempus mattis. Nunc cursus arcu sapien, non bibendum quam sollicitudin nec. Phasellus dolor magna, luctus vitae nisl ut, lobortis dictum orci. Donec at felis posuere, mattis odio ac, pretium tortor. Donec ut quam interdum, volutpat dolor sit amet, luctus elit. Phasellus non lacinia ex, id fermentum eros. Sed semper ultrices magna, nec varius nulla pretium quis.
		</p>
		<p class="single-news__highlight">
			Container pour mise en avant d’un contenu
		</p>
		<div class="single-news__link">
			<a href="{{ route('about-'.app()->getLocale()) }}" class="btn-couture">Qui sommes-nous</a>
		</div>
		<p class="single-news__txt">
			Duis tincidunt risus vitae diam molestie laoreet. Fusce commodo purus vitae ante mollis lobortis. Cras commodo suscipit nulla, eu lobortis dui auctor et. In et lacinia augue. Aliquam egestas ultrices ex, at efficitur tellus porta id. Cras id neque enim. Suspendisse blandit erat ligula, eu luctus sapien auctor quis. Pellentesque pellentesque molestie erat. Nulla cursus sit amet enim dictum dapibus. Morbi tincidunt commodo magna vitae ullamcorper. Vivamus eu nisi ac velit ultricies.
		</p>
		<div class="single-news__img-container">
			<img src="{{ asset('images/pictures/news/image_trees.png') }}">
		</div>
		<p class="single-news__txt">
			Duis tincidunt risus vitae diam molestie laoreet. Fusce commodo purus vitae ante mollis lobortis. Cras commodo suscipit nulla, eu lobortis dui auctor et. In et lacinia augue. Aliquam egestas ultrices ex, at efficitur tellus porta id. Cras id neque enim. Suspendisse blandit erat ligula, eu luctus sapien auctor quis. Pellentesque pellentesque molestie erat. Nulla cursus sit amet enim dictum dapibus. Morbi tincidunt commodo magna vitae ullamcorper. Vivamus eu nisi ac velit ultricies.
		</p>
		<div class="single-news__img-container">
			<img src="{{ asset('images/pictures/news/image_trees.png') }}">
		</div>
		<p class="single-news__txt">
			Duis tincidunt risus vitae diam molestie laoreet. Fusce commodo purus vitae ante mollis lobortis. Cras commodo suscipit nulla, eu lobortis dui auctor et. In et lacinia augue. Aliquam egestas ultrices ex, at efficitur tellus porta id. Cras id neque enim. Suspendisse blandit erat ligula, eu luctus sapien auctor quis. Pellentesque pellentesque molestie erat. Nulla cursus sit amet enim dictum dapibus. Morbi tincidunt commodo magna vitae ullamcorper. Vivamus eu nisi ac velit ultricies.
		</p>
		<div class="flex justify-between single-news__nextprev">
			<a href="{{ route('news-'.app()->getLocale(), ['slug' => 'premier-article-benu-couture']) }}" class="btn-slider-left">Actualité précédente</a>
			<a href="{{ route('news-'.app()->getLocale(), ['slug' => 'premier-article-benu-couture']) }}" class="btn-slider-right">Actualité suivante</a>
		</div>
		<div class="single-news__backlink">
			<a href="{{ route('news-'.app()->getLocale()) }}" class="btn-couture">Toutes les actualités</a>
		</div>
	</div>
@endsection

@section('scripts')

@endsection