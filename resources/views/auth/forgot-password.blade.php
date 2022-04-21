@extends('layouts.base_layout')

@section('title')
    BENU COUTURE - Mot de passe oublié
@endsection

@section('description')
    Utilisez votre adresse e-mail pour définir un nouveau mot de passe
@endsection

@section('robots-behaviour')
noindex, nofollow
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs pattern-bg">
        <div class="benu-container breadcrumbs__content flex justify-start">
            <a href="{{ route('home') }}">{{ __('breadcrumbs.home') }}</a>
            <div class="pl-5 pr-5">
                >
            </div>
            <a href="{{ route('login-'.app()->getLocale()) }}" class="primary-color"><strong>{{ __('breadcrumbs.forgotten-pwd') }}</strong></a>
        </div>
    </div>
@endsection

@section('main-content')
    <section class="benu-container login">
        <h3 class="login__subtitle">BENU COUTURE</h3>
        <h1 class="login__title">J'ai oublié mon <br/>mot de passe</h1>

        <form method="POST" action="{{ route('password.email', ['locale' => app()->getLocale()]) }}" class="w-1/4 m-auto mb-10">
            @csrf
            <div class="input-group reactive-label-input">
                <label for="email">Adresse e-mail *</label>
                <input type="email" id="email" name="email" class="input-underline w-full" required>
            </div>

            <p class="login__info">
                <em>* Champs obligatoires</em>
            </p>
            
            <div class="m-auto login__validate">
                <input type="submit" name="login_submit" class="btn-couture-plain" value="Mettre à jour mon mot de passe">
                <div class="login__validate__question">
                    Je n’ai pas encore de compte BENU COUTURE.
                </div>
                <a href="{{ route('register-'.app()->getLocale()) }}" class="btn-slider-left mt-3">Je crée mon compte ici</a>
            </div>
            @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif
        </form>
    </section>
@endsection

@section('scripts')

@endsection



