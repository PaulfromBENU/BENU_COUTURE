@extends('layouts.base_layout')

@section('title')
    {{ __('models.seo-title', ['name' => 'Caretta']) }}
@endsection

@section('description')
    {{ __('models.seo-description') }}
@endsection

@section('robots-behaviour')
    noindex, nofollow
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs pattern-bg">
        <div class="benu-container breadcrumbs__content flex justify-start">
            <a href="{{ route('home', [app()->getLocale()]) }}">{{ __('breadcrumbs.home') }}</a>
            <div class="pl-5 pr-5">
                >
            </div>
            <a href="{{ route('dashboard', ['locale' => app()->getLocale()]) }}" class="primary-color"><strong>{{ __('breadcrumbs.my-account') }}</strong></a>
        </div>
    </div>
@endsection

@section('main-content')
    @livewire('dashboard.dashboard-navigation', ['section' => $section])
@endsection

@section('scripts')
<script type="text/javascript">
    
</script>
@endsection