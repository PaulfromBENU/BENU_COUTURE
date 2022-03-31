<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/tailwindcss.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/style_landing_page.css') }}"> -->

    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/983b1bd0fa.js" crossorigin="anonymous"></script>

    <title>Bienvenue sur BENU COUTURE</title>
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
                <a href="https://www.facebook.com/benuvillageesch/" target="_blank"><i class="fab fa-facebook-f"></i></a>
            </p>
            <p>
                <a href="https://www.instagram.com/benu_village/" target="_blank"><i class="fab fa-instagram"></i></a>
            </p>
            <p>
                <a href="https://lu.linkedin.com/company/benu-village-esch" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            </p>
        </div>
    </header>

    <main>
        <section class="pattern_bg">
            <div class="central_col">
                <div class="central_textbox">
                    <div class="central_textbox__teaser">
                        <p>
                            Soon....
                        </p>
                    </div>
                    <h1>BENU COUTURE</h1>
                    <p class="central_textbox__sub">
                        Lancement du site&nbsp;: 2ème trimestre 2022
                    </p>
                    <p class="central_textbox__desc">
                        Deux jeans que tu ne veux plus&nbsp;? Un pull qui t’est cher mais qui est devenu trop petit&nbsp;? BENU
                        COUTURE est le premier atelier de couture UpCycling au Luxembourg qui confectionne ses
                        créations, inventives et uniques, à partir de dons de vêtements locaux. Notre équipe, constituée
                        de tailleurs et stylistes professionnels, s’engage chaque jour à choisir les meilleures qualités de tissus, à trouver les meilleurs assemblages afin de créer des produits uniques pour toi : de haute qualité et composés surtout de matières naturelles pour assurer leur durabilité. Notre production est artisanale et locale et les vêtements produits ne subissent aucun traitement chimique. BENU COUTURE te permet également de réparer tes pièces préférées ou bien de les intégrer dans une nouvelle création, personnelle et rien que pour toi.
                    </p>
                    <ul class="central_textbox__desc">
                        <li>BENU COUTURE</li>
                        <li class="text-left flex">
                            <p class="pr-2 pt-2 lg:pt-3">@svg('list_cintre')</p>
                            <p> conçoit et produit localement une mode UpCycling unique,
                            </p>
                        </li>
                        <li class="text-left flex">
                            <p class="pr-2 pt-2 lg:pt-3">@svg('list_cintre')</p>
                            <p> offre des solutions allant des tailles XS jusqu'à 5XL ainsi que des merveilles pour nos plus jeunes,
                            </p>
                        </li>
                        <li class="text-left flex">
                            <p class="pr-2 pt-2 lg:pt-3">@svg('list_cintre')</p>
                            <p> répare et transforme selon tes idées individuelles (tant qu'à faire!) : changement de couleurs, design, taille ...,
                            </p>
                        </li>
                        <li class="text-left flex">
                            <p class="pr-2 pt-2 lg:pt-3">@svg('list_cintre')</p>
                            <p> sensibilise sur les problématiques du marché de textile ordinaire, prend position et discute les sujets liés à la mode durable.
                            </p>
                        </li>
                    </ul>
                    <p class="central_textbox__desc">
                        BENU COUTURE attend son propre site couture.benu.lu (perspective : avant la fin mai
                        2022).
                    </p>
                </div>
                <div class="contact-form-container">
                    <div>
                        <h2 class="text-center mb-6">
                            Restons en contact
                        </h2>
                        <!-- <div>
                            <form method="POST" class="contact_form">
                                <input type="email" name="newsletter_email" placeholder="Je m'inscris à la newsletter">
                                <input type="submit" name="newsletter_btn" value="Je m'inscris">
                            </form>
                        </div> -->
                        <div class="contact-link text-center">
                            <a href="https://benu.lu/fr/contactez-nous/" class="btn-couture-plain btn-couture-plain--dark-hover" target="_blank">Je m'inscris à la newsletter</a>
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

        <footer class="landing-footer">
            <div class="landing-footer__links">
                <div class="landing-footer__links__header-container">
                    <div class="landing-footer__links__header">
                        Suis-nous sur
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
                &#169; 2022 - Design&nbsp;: Kamoo Studio <br/> & Développement&nbsp;: BENU Village ASBL
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