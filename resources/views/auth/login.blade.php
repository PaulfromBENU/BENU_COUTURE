@extends('layouts.base_layout')

@section('title')
    Rejoignez BENU COUTURE !
@endsection

@section('description')
    Inscrivez-vous sur BENU COUTURE pour accéder à l'ensemble de nos services et acheter nos créations uniques entièrement à partir de tissus réutilisés, en ligne ou dans notre magasin à Esch-Sur-Alzette. 
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs pattern-bg">
        <div class="benu-container breadcrumbs__content flex justify-start">
            <a href="{{ route('home') }}">{{ __('breadcrumbs.home') }}</a>
            <div class="pl-5 pr-5">
                >
            </div>
            <a href="{{ route('login-'.app()->getLocale()) }}" class="primary-color"><strong>{{ __('breadcrumbs.login') }}</strong></a>
        </div>
    </div>
@endsection

@section('main-content')
    <section class="benu-container login">
        <h3 class="login__subtitle">BENU COUTURE</h3>
        <h1 class="login__title">Je me connecte <br/>à mon compte BENU</h1>

        <form method="POST" action="{{ route('login.connect') }}" class="w-1/4 m-auto mb-10">
            @csrf
            <div class="input-group reactive-label-input">
                <label for="login_email">Adresse e-mail *</label>
                <input type="email" id="login_email" name="email" class="input-underline w-full" required>
            </div>
            <div class="input-group reactive-label-input">
                <label for="login_password">Mot de passe *</label>
                <input type="password" id="login_password" name="password" class="input-underline w-full" required>
            </div>

            <div class="flex justify-between">
                <!-- Remember Me -->
                <div class="login__options">
                    <input id="remember" type="checkbox" class="rounded border-gray-300 text-red-600 shadow-sm" name="remember" value="1" checked>
                    <label for="remember" class="inline-flex items-center">
                        <span class="ml-3">Se souvenir de moi</span>
                    </label>
                </div>

                <div class="flex items-center justify-end login__options">
                    <a class="hover:underline" href="{{ route('password.request') }}">
                        Mot de passe oublié&nbsp;?
                    </a>
                </div>
            </div>

            <p class="login__info">
                <em>* Champs obligatoires</em>
            </p>
            
            <div class="m-auto login__validate">
                <input type="submit" name="login_submit" class="btn-couture-plain" value="Je me connecte">
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

