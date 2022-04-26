@php
	app()->setLocale('en');
@endphp

@extends('layouts.error_page_layout')

@section('title')
	{{ __('welcome.error-seo-title') }}
@endsection

@section('description')
	{{ __('welcome.error-seo-description') }}
@endsection

@section('main-content')
	<section class="text-center text-3xl pt-10 error-page">
		<div style="padding-top: 10vh;">
			<h2>
				Wooops! 500 error...
			</h2>
			<h1>
				An internal error occured.
			</h1>
		</div>
		<div class="text-center">
			@svg('error_picture')
		</div>
	</section>
@endsection

@section('scripts')

@endsection
