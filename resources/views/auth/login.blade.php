@extends('layouts.base_layout')

@section('title')
    Rejoignez BENU COUTURE !
@endsection

@section('description')
    Inscrivez-vous sur BENU COUTURE pour accéder à l'ensemble de nos services et acheter nos créations uniques entièrement à partir de tissus réutilisés, en ligne ou dans notre magasin à Esch-Sur-Alzette. 
@endsection

@section('main-content')
    <section class="benu-container mt-10 pt-5 mb-10 pb-10">
        <h1 class="mt-10 mb-10 text-center text-3xl">Connectez-vous sur BENU COUTURE</h1>
        <form method="POST" action="{{ route('login.connect', ['locale' => app()->getLocale()]) }}" class="w-1/3 m-auto mb-10">
            @csrf
            <div class="input-group">
                <label for="login_email">Adresse e-mail</label><br/>
                <input type="email" id="login_email" name="email" class="input-underline w-full mb-5" placeholder="example@email.com" required>
            </div>
            <div class="input-group">
                <label for="login_password">Mot de passe</label><br/>
                <input type="password" id="login_password" name="password" class="input-underline w-full mb-5" required>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        Mot de passe oublié&nbsp;?
                    </a>
                @endif
            </div>
            <div class="flex justify-around m-auto mt-5 pt-5">
                <input type="submit" name="login_submit" class="btn-couture" value="Je me connecte">
                <a href="{{ route('register') }}" class="btn-slider-left mt-3">Pas encore inscrit.e ?</a>
            </div>
            @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif
        </form>
    </section>
@endsection

@section('scripts')

@endsection

