@extends('layouts.base_layout')

@section('title')
    Bienvenue sur BENU COUTURE
@endsection

@section('main-content')
    @include('includes.welcome.presentation')
    
@endsection

@section('scripts')
<script type="text/javascript">
    $(function() {
        $('.header__main-menu__icons__btn').on('mouseenter', function() {
            $('path', this).toggleClass('svg-primary--active');
        });
        $('.header__main-menu__icons__btn').on('mouseleave', function() {
            $('path', this).toggleClass('svg-primary--active');
        });
    });
</script>
@endsection
