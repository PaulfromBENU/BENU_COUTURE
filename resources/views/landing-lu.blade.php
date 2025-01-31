<!DOCTYPE html>
<html lang="lu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="mask-icon" href="{{ asset('static/favicon/safari-pinned-tab.svg') }}" color="#f9941d">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('images/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('images/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/tailwindcss.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/style_landing_page.css') }}"> -->

    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/983b1bd0fa.js" crossorigin="anonymous"></script>

    <title>Wëllkomm op BENU COUTURE</title>
</head>
<body class="landing-body">
    <header class="landing-header">
        <div class="header-bckgnd">
            <div class="header-bckgnd__font">
                <div class="header-bckgnd__moving header-bckgnd__moving--1">
                    <img src="{{ asset('landing/pictures/benu_landing_clouds_illustration.svg') }}" style="height: 100%;" />
                </div>
                <div class="header-bckgnd__moving header-bckgnd__moving--2">
                    <img src="{{ asset('landing/pictures/benu_landing_clouds_illustration.svg') }}" style="height: 100%;" />
                </div>
            </div>
            <div class="header-bckgnd__bird" id="header-bird-pic">
                <img src="{{ asset('landing/pictures/benu_landing_illustration.svg') }}" class="header-bckgnd__bird__img" />
            </div>
        </div>
        
        <div class="header_logo">
            <img src="{{ asset('landing/pictures/logo_benu_couture_blanc.svg') }}" class="header_logo__img" />
        </div>
        <div class="header_socialmedia">
            <p>
                <!-- <a href="https://www.facebook.com/benuvillageesch/" target="_blank"><i class="fab fa-facebook-f"></i></a> -->
                <a href="{{ route('landing') }}" class="hover:underline @if(Route::currentRouteName() == 'landing') underline @endif">FR</a>
            </p>
            <p>
                <!-- <a href="https://www.instagram.com/benu_village/" target="_blank"><i class="fab fa-instagram"></i></a> -->
                <a href="{{ route('landing-lu') }}" class="hover:underline @if(Route::currentRouteName() == 'landing-lu') underline @endif">LU</a>
            </p>
            <p>
                <!-- <a href="https://lu.linkedin.com/company/benu-village-esch" target="_blank"><i class="fab fa-linkedin-in"></i></a> -->
                <a href="{{ route('landing-de') }}" class="hover:underline @if(Route::currentRouteName() == 'landing-de') underline @endif">DE</a>
            </p>
            <p>
                <!-- <a href="https://lu.linkedin.com/company/benu-village-esch" target="_blank"><i class="fab fa-linkedin-in"></i></a> -->
                <a href="{{ route('landing-en') }}" class="hover:underline @if(Route::currentRouteName() == 'landing-en') underline @endif">EN</a>
            </p>
        </div>
    </header>

    <main>
        <section class="pattern_bg">
            <div class="central_col">
                <div class="central_textbox">
                    <div class="central_textbox__teaser">
                        <p>
                            GESCHWËNN....
                        </p>
                    </div>
                    <h1>BENU COUTURE</h1>
                    <p class="central_textbox__sub">
                        Lancement vun der Websäit: 2. Quartal 2022
                    </p>
                    <p class="central_textbox__desc">
                        Zwou Jeansboxen, déi s Du net méi wëlls? E Pullover, deen Dir um Häerz läit, awer net méi passt? <strong>BENU COUTURE</strong> ass deen éischten UpCycling-Schneideratelier zu Lëtzebuerg, dee seng originell an eenzegaarteg Kreatiounen aus lokale Kleederspenden hierstellt. Eist Team, aus professionelle Schneider:innen an Designer:innen, setzt sech all Dag dofir an, mat beschte Stoffqualitéiten déi schéinste Kombinatiounen ze fannen an eenzegaarteg Produite fir Dech hierzestellen: zesummegesat aus virun allem natierleche Materialien zesummegesat, bidde si déi héchste Qualitéit a Liewenszäit.
                    </p>
                    <p class="central_textbox__desc">
                        Eis Kreatioune sinn handgemaach a gi kengem cheemeschen Traitement ënnerzunn. <strong>BENU COUTURE</strong> bitt Dir och un, Deng Liblingsstécker ze flécken oder si an enger neier, perséinlecher a just fir Dech bestëmmter Kreatioun z’integréieren.
                    </p>
                    <ul class="central_textbox__desc">
                        <li><strong>BENU COUTURE</strong></li>
                        <li class="text-left flex">
                            <p class="pr-2 pt-2 lg:pt-3">@svg('list_cintre')</p>
                            <p> entwërft a produzéiert lokal eng eenzegaarteg UpCyling-Moud,
                            </p>
                        </li>
                        <li class="text-left flex">
                            <p class="pr-2 pt-2 lg:pt-3">@svg('list_cintre')</p>
                            <p> bitt Gréissten u vun XS bis 5XL, esouwéi kleng Wonnerwierker fir déi Jéngsten,
                            </p>
                        </li>
                        <li class="text-left flex">
                            <p class="pr-2 pt-2 lg:pt-3">@svg('list_cintre')</p>
                            <p> reparéiert a verwandelt no Dengen individuelle Virstellungen: Faarfwiessel, Design, Gréisst, ...,
                            </p>
                        </li>
                        <li class="text-left flex">
                            <p class="pr-2 pt-2 lg:pt-3">@svg('list_cintre')</p>
                            <p> sensibiliséiert fir d’Problematik vun der haiteger Moude-Branche, bezitt Stellung an diskutéiert iwwer Theeme ronderëm nohalteg Kleedung.
                            </p>
                        </li>
                    </ul>
                    <p class="central_textbox__desc">
                        <strong>BENU COUTURE</strong> waart op seng eegen Internetsäit couture.benu.lu (viraussiichtlech bis Enn Mee 2022).
                    </p>
                </div>
                <div class="contact-form-container">
                    <div>
                        <h2 class="text-center mb-6">
                            Bléif mat eis a Kontakt
                        </h2>
                        <!-- <div>
                            <form method="POST" class="contact_form">
                                <input type="email" name="newsletter_email" placeholder="Je m'inscris à la newsletter">
                                <input type="submit" name="newsletter_btn" value="Je m'inscris">
                            </form>
                        </div> -->
                        <div class="contact-link text-center">
                            <a href="https://benu.lu/fr/contactez-nous/" class="btn-couture-plain btn-couture-plain--dark-hover" target="_blank">Ech abonéieren d'Newsletter</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="universe">
            <div class="text-center">
                <h2>
                    D’BENU-Welt
                </h2>
                <div class="universe__links">
                    <div>
                        <a href="https://www.benureuse.lu/lu/" class="btn-large btn-yellow" target="_blank">BENU REUSE</a>
                    </div>
                    <div>
                        <a href="https://benu.lu/" class="btn-large btn-green" target="_blank">BENU VILLAGE</a>
                    </div>
                </div>
            </div>
        </section>

        <footer class="landing-footer">
            <div class="landing-footer__links">
                <div class="landing-footer__links__header-container">
                    <div class="landing-footer__links__header">
                        Suivéier eis op
                    </div>
                </div>
                <div class="landing-footer__links__icons">
                    <a href="https://www.facebook.com/benuvillageesch/" target="_blank" class="landing-footer__links__icon">
                        <!-- <a href="https://www.facebook.com/benuvillageesch/" target="_blank"><i class="fab fa-facebook-f"></i></a> -->
                        <p>
                            <i class="fab fa-facebook-f"></i>
                        </p>
                    </a>
                    <a href="https://www.instagram.com/benu_village/" target="_blank" class="landing-footer__links__icon">
                        <!-- <a href="https://www.instagram.com/benu_village/" target="_blank"><i class="fab fa-instagram"></i></a> -->
                        <p>
                            <i class="fab fa-instagram"></i>
                        </p>
                    </a>
                    <a href="https://lu.linkedin.com/company/benu-village-esch" target="_blank" class="landing-footer__links__icon">
                        <p>
                            <i class="fab fa-linkedin-in"></i>
                        </p>
                        <!-- <a href="https://lu.linkedin.com/company/benu-village-esch" target="_blank"><i class="fab fa-linkedin-in"></i></a> -->
                    </a>
                </div>
            </div>
            <div class="text-center landing-footer__copyright">
                &#169; 2022 - Design&nbsp;: Kamoo Studio <br/> & Entwécklung&nbsp;: BENU Village Esch asbl
            </div>
        </footer>
    </main>

    <!-- No layout to reduce weight, cannot use js from app  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(function() {
            let width = window.innerWidth;
            if (width >= 1024) {
                let newTop = '130px';
                $('#header-bird-pic').css('top', newTop);
                setInterval(function() {
                    if(window.innerWidth >= 1024) {
                        newTop = 60 + 150*Math.random();
                        newTop += 'px';
                        $('#header-bird-pic').css('top', newTop);
                    } else {
                        newTop = '80px';
                        $('#header-bird-pic').css('top', newTop);
                    }
                }, 2500);
            }
        });
    </script>
</body>
</html>