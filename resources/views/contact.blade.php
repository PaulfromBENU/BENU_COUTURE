@extends('layouts.base_layout')

@section('title')
	{{ __('contact.seo-title') }}
@endsection

@section('description')
	{{ __('contact.seo-description') }}
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="benu-container breadcrumbs__content flex justify-start">
			<a href="{{ route('home', [app()->getLocale()]) }}">{{ __('breadcrumbs.home') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('contact') }}" class="primary-color"><strong>{{ __('breadcrumbs.contact') }}</strong></a>
		</div>
	</div>
@endsection

@section('main-content')
	<section class="w-1/2 m-auto text-center contact">
		<div class="contact__subtitle">
			{{ __('contact.subtitle') }}
		</div>
		<div class="contact__title">
			<h1>
				{{ __('contact.title') }}
			</h1>
		</div>
		<div class="contact__mail">
			<a href="mailto:info@benucouture.lu" class="btn-slider-left m-auto">info@benucouture.lu</a>
		</div>
		<div class="contact__phone">
			+352 123 456 789
		</div>
		<div class="contact__opening">
			{{ __('contact.opening') }}
		</div>
		<div class="contact__moreinfo">
			{{ __('contact.extra-txt') }}
		</div>
		<div class="contact__form">
			<!-- To be completed with the contact form -->
		</div>
	</section>
@endsection

@section('scripts')

@endsection