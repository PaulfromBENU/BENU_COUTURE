@extends('layouts.base_layout')

@section('title')
    Bienvenue sur BENU COUTURE
@endsection

@section('main-content')
    @include('includes.welcome.presentation')
    @include('includes.welcome.campaign')
    @include('includes.welcome.last_creations')
    @include('includes.welcome.other_creations')
@endsection

@section('scripts')
<script type="text/javascript">
    //
</script>
@endsection
