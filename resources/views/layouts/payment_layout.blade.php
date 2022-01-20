@extends('layouts.html_general_layout')

@section('og-metadata-top')
	@yield('og-metadata')
	@sectionMissing('og-metadata')
        <meta property="og:title" content="@yield('title-top')" />
        <meta property="og:url" content="{{ url()->full() }}" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="@yield('description')" />
        <meta property="og:image" content="{{ asset('images/benu_landing_illustration.svg') }}" />
        <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
    @endif
@endsection

@section('title-top')
	@yield('title')
@endsection

@section('description-top')
	@yield('description')
@endsection

@section('robots-behaviour-top')
	noindex, nofollow
@endsection

@section('seo-keywords-top')
	@yield('seo-keywords')
@endsection

@section('header')
	@include('header.payment_header')
@endsection

@section('modals')
@endsection

@section('main-content-top')
	@yield('main-content')
@endsection

@section('footer')
	@include('footer.payment_footer')
@endsection

@section('scripts-top')
	@yield('scripts')
@endsection

