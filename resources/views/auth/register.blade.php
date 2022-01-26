@extends('layouts.base_layout')

@section('title')
    Rejoignez BENU COUTURE !
@endsection

@section('description')
    Inscrivez-vous sur BENU COUTURE pour accéder à l'ensemble de nos services et acheter nos créations uniques entièrement à partir de tissus réutilisés, en ligne ou dans notre magasin à Esch-Sur-Alzette. 
@endsection

@section('main-content')
    <section class="benu-container mt-10 pt-5 mb-10 pb-10">
        <h1 class="mt-10 mb-10 text-center text-3xl">Vous souhaitez vous inscrire sur BENU COUTURE&nbsp;?</h1>
        <form method="POST" action="{{ route('register') }}" class="w-1/3 m-auto mb-10">
            @csrf
            <div class="input-group">
                <label>Prénom</label><br/>
                <input type="text" name="register_first_name" class="input-underline w-full mb-5" placeholder="Prénom" required>
            </div>
            <div class="input-group">
                <label>Nom</label><br/>
                <input type="text" name="register_last_name" class="input-underline w-full mb-5" placeholder="Nom" required>
            </div>
            <div class="input-group">
                <label>Adresse e-mail</label><br/>
                <input type="email" name="register_email" class="input-underline w-full mb-5" placeholder="exemple@email.com" required>
            </div>
            <div class="input-group">
                <label>Mot de passe</label><br/>
                <input type="password" name="register_password" class="input-underline w-full mb-5" required>
            </div>
            <div class="input-group">
                <label>Confirmation mot de passe</label><br/>
                <input type="password" name="register_password_confirmation" class="input-underline w-full mb-5" required>
            </div>
            <div class="flex justify-around m-auto mt-5 pt-5">
                <input type="submit" name="register_submit" class="btn-couture" value="Je m'inscris">
                <a href="{{ route('login') }}" class="btn-slider-left mt-3">Déjà inscrit.e ?</a>
            </div>
        </form>
    </section>
    
        
            <!-- Name -->
            <!-- <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div> -->

            <!-- Email Address -->
            <!-- <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div> -->

            <!-- Password -->
            <!-- <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div> -->

            <!-- Confirm Password -->
            <!-- <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

            </div>
        </form>-->
@endsection

@section('scripts')

@endsection

