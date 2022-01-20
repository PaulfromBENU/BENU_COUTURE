@extends('layouts.base_layout')

@section('title')
    Bienvenue sur BENU COUTURE
@endsection

@section('main-content')
    <section class="pattern_bg">
        <div class="central_col">
            <div class="central_textbox">
                <div class="central_textbox__teaser">
                    <p>
                        Soon
                    </p>
                </div>
                <h1>BENU COUTURE</h1>
                <p class="central_textbox__sub">
                    Lancement du site&nbsp;: 2ème trimestre 2022
                </p>
                <p class="central_textbox__desc">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
            <div class="contact_form_container">
                <div>
                    <h2 class="text-center">
                        Restons en contact
                    </h2>
                    <!-- <div>
                        <form method="POST" class="contact_form">
                            @csrf
                            <input type="email" name="newsletter_email" placeholder="Je m'inscris à la newsletter">
                            <input type="submit" name="newsletter_btn" value="Je m'inscris">
                        </form>
                    </div> -->
                    <div class="contact-link text-center">
                        <a href="https://benu.lu/fr/contactez-nous/" target="_blank">Je m'inscris à la newsletter</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="universe">
        <div class="text-center">
            <h2>
                L'univers BENU
            </h2>
            <div class="universe__links">
                <div>
                    <a href="https://www.benureuse.lu/fr/" class="btn-large btn-yellow" target="_blank">BENU REUSE</a>
                </div>
                <div>
                    <a href="https://benu.lu/" class="btn-large btn-green" target="_blank">BENU VILLAGE</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
