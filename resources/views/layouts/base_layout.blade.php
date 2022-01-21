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
	@if(App::environment('stage'))
		noindex, nofollow
	@else
		@yield('robots-behaviour', 'index, follow')
	@endif
@endsection

@section('seo-keywords-top')
	@yield('seo-keywords')
@endsection

@section('header')
	<!-- Harmonica menu -->
    @include('header.harmonica_menu')
	
	<!-- Menu and Nav header -->
	@include('header.general_header')
@endsection

@section('modals')
	<!-- Opaque background -->
	<div id="modal-opacifier" class="modal-opacifier" style="display: none;"></div>

	<!-- Language selection -->
	@include('modals.lang_modal')

	<!-- Central Modal -->
    <div class="modal general-modal" id="general_modal" style="display: none;">
        @yield('modal')
    </div>

    <!-- Side modal -->
    <div class="modal side-modal" id="general-side-modal" style="display: none;">
        @yield('side_modal')
    </div>
@endsection

@section('main-content-top')
	<div class="main-content-container">
		@yield('main-content')
	</div>
@endsection

@section('footer')
	@include('footer.footer')
@endsection

@section('scripts-top')
	@yield('scripts')
@endsection

