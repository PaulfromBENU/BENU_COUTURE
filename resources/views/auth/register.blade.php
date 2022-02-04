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
            <a href="{{ route('home', [app()->getLocale()]) }}">{{ __('breadcrumbs.home') }}</a>
            <div class="pl-5 pr-5">
                >
            </div>
            <a href="{{ route('register', ['locale' => app()->getLocale()]) }}" class="primary-color"><strong>{{ __('breadcrumbs.register') }}</strong></a>
        </div>
    </div>
@endsection

@section('main-content')
    <section class="register mt-10 pt-5 mb-10 pb-10">
        <h3 class="register__subtitle">BENU COUTURE</h3>
        <h1 class="register__title">Je me crée <br/>mon compte BENU</h1>

        @if($errors->any())
            <div class="register__errors w-2/3 m-auto mt-5 mb-5">
                Une erreur s'est produite. Merci de vérifier que tous les champs ci-dessous sont correctement remplis.
                @if(App::environment('stage'))
                    {!! implode('', $errors->all('<div class="primary-color">:message</div>')) !!}
                @endif
            </div>
        @endif

        <form method="POST" action="{{ route('register', ['locale' => app()->getLocale()]) }}" class="w-1/2 m-auto mb-10" id="register-form">
            @csrf
            <div class="flex justify-between">
                <div class="w-5/12">
                    <div class="flex justify-between input-group register__form__radio-group">
                        <input type="radio" id="register_gender_male" name="register_gender" value="male">
                        <label for="register_gender_male">Monsieur</label><br>
                        <input type="radio" id="register_gender_female" name="register_gender" value="female">
                        <label for="register_gender_female">Madame</label><br>
                        <input type="radio" id="register_gender_neutral" name="register_gender" value="neutral">
                        <label for="register_gender_neutral">Non genré</label> 
                    </div>
                    <div class="input-group reactive-label-input">
                        <label for="register_first_name">Prénom *</label>
                        <input type="text" id="register_first_name" name="register_first_name" class="input-underline w-full" tabindex="1" minlength="2" maxlength="255" required>
                        @error('register_first_name')
                            <div class="primary-color">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group reactive-label-input">
                        <label>Adresse e-mail *</label>
                        <input type="email" name="email" class="input-underline w-full" tabindex="3" minlength="2" maxlength="255" required>
                    </div>
                </div>

                <div class="w-5/12">
                    <div class="input-group reactive-label-input">
                        <label>Société, organisation</label>
                        <input type="text" name="register_company" class="input-underline w-full" maxlength="255">
                    </div>
                    <div class="input-group reactive-label-input">
                        <label>Nom *</label>
                        <input type="text" name="register_last_name" class="input-underline w-full" tabindex="2" minlength="2" maxlength="255" required>
                    </div>
                    <div class="input-group reactive-label-input">
                        <label>Numéro de téléphone (avec indicatif)</label>
                        <input type="text" name="register_phone" class="input-underline w-full" minlength="6" maxlength="30" tabindex="4">
                    </div>
                </div>
            </div>

            <h3 class="register__lowtitle">Mot de passe</h3>

            <div class="flex justify-between">
                <div class="input-group reactive-label-input w-5/12">
                    <label>Mot de passe *</label>
                    <input type="password" name="register_password" class="input-underline w-full" tabindex="5" minlength="8" maxlength="150" required>
                    <div class="reactive-label-input__show-btn reactive-label-input__show-btn--show">
                        @svg('view-pwd-btn')
                    </div>
                    <div class="reactive-label-input__show-btn reactive-label-input__show-btn--hide" style="display: none;">
                        @svg('hide-pwd-btn')
                    </div>
                </div>
                <div class="input-group reactive-label-input w-5/12">
                    <label>Confirmation du mot de passe *</label>
                    <input type="password" name="register_password_confirmation" class="input-underline w-full" tabindex="6" minlength="8" maxlength="150" required>
                    <div class="reactive-label-input__show-btn reactive-label-input__show-btn--show">
                        @svg('view-pwd-btn')
                    </div>
                    <div class="reactive-label-input__show-btn reactive-label-input__show-btn--hide" style="display: none;">
                        @svg('hide-pwd-btn')
                    </div>
                </div>
            </div>
            <p class="text-sm"><em>Le mot de passe doit contenir au moins 8 caractères alpha-numériques, dont au moins une minuscule et une majuscule</em></p>

            <h3 class="register__lowtitle register__lowtitle--btn">+ Ajouter une adresse</h3>

            <div class="register__address" style="display: none;">
                <h4 class="register__address__title">Ajouter une adresse</h4>
                <div class="register__address__address-name">
                    <div class="reactive-label-input">
                        <label>Donnez un titre à cette adresse <span class="register_optionnal_star">*</span></label>
                        <input type="text" name="register_address_name" class="input-underline w-full register_address_field register_address_field_mandatory" tabindex="7" maxlength="150">
                    </div>
                    <p class="text-sm text-white"><em>(requis pour créer une adresse)</em></p>
                </div>
                <div class="flex justify-between">
                    <div class="w-5/12">
                        <div class="input-group reactive-label-input">
                            <label>Prénom <span class="register_optionnal_star">*</span></label>
                            <input type="text" name="register_address_first_name" class="input-underline w-full register_address_field register_address_field_mandatory" tabindex="8" maxlength="255">
                        </div>
                        <div class="input-group reactive-label-input">
                            <label>Numéro de rue <span class="register_optionnal_star">*</span></label>
                            <input type="text" name="register_address_number" class="input-underline w-full register_address_field register_address_field_mandatory" tabindex="10">
                        </div>
                        <div class="input-group reactive-label-input">
                            <label>Étage, appartement, ...</label>
                            <input type="text" name="register_address_floor" class="input-underline w-full register_address_field" tabindex="12" maxlength="50">
                        </div>
                        <div class="input-group reactive-label-input">
                            <label>Ville <span class="register_optionnal_star">*</span></label>
                            <input type="text" name="register_address_city" class="input-underline w-full register_address_field register_address_field_mandatory" tabindex="14" maxlength="150">
                        </div>
                    </div>

                    <div class="w-5/12">
                        <div class="input-group reactive-label-input">
                            <label>Nom <span class="register_optionnal_star">*</span></label>
                            <input type="text" name="register_address_last_name" class="input-underline w-full register_address_field register_address_field_mandatory" tabindex="9" maxlength="255">
                        </div>
                        <div class="input-group reactive-label-input">
                            <label>Nom de la rue <span class="register_optionnal_star">*</span></label>
                            <input type="text" name="register_address_street" class="input-underline w-full register_address_field register_address_field_mandatory" tabindex="11" maxlength="255">
                        </div>
                        <div class="input-group reactive-label-input">
                            <label>Code postal <span class="register_optionnal_star">*</span></label>
                            <input type="text" name="register_address_zip" class="input-underline w-full register_address_field register_address_field_mandatory" tabindex="13" maxlength="10">
                        </div>
                        <div class="input-group reactive-label-input">
                            <label>Téléphone de contact <span class="register_optionnal_star">*</span></label>
                            <input type="text" name="register_address_phone" class="input-underline w-full register_address_field register_address_field_mandatory" tabindex="15" maxlength="30">
                        </div>
                    </div>
                </div>
                <div class="w-full reactive-label-input">
                    <label>Pays <span class="register_optionnal_star">*</span></label>
                    <input type="text" name="register_address_country" class="input-underline w-full register_address_field register_address_field_mandatory" tabindex="16" maxlength="50">
                </div>

                <div class="w-full reactive-label-input">
                    <label>Remarques ou informations spécifiques</label>
                    <input type="text" name="register_address_other" class="input-underline w-full register_address_field" tabindex="17" maxlength="255">
                </div>
            </div>

            <p class="register__info">
                <em>* Les champs marqués d'une étoile sont obligatoires. Les autres sont optionnels.</em>
            </p>
                
              
            <div class="register__options">
                <label for="register_age" class="inline-flex items-center">
                    <input id="register_age" type="checkbox" class="rounded border-gray-300 text-red-600 shadow-sm" name="register_age" value="1" tabindex="18">
                    <span class="ml-10">Je confirme avoir 18 ans et je dispose de tous mes droits juridiques *</span>
                </label>
            </div>
            <div class="register__options">
                <label for="register_legal" class="inline-flex items-center">
                    <input id="register_legal" type="checkbox" class="rounded border-gray-300 text-red-600 shadow-sm" name="register_legal" value="1" tabindex="19">
                    <span class="ml-10">J’accepte les conditions générales et la politique de confidentialité de BENU COUTURE *</span>
                </label>
            </div>  
            <div class="register__options">
                <label for="register_newsletter" class="inline-flex items-center">
                    <input id="register_newsletter" type="checkbox" class="rounded border-gray-300 text-red-600 shadow-sm" name="register_newsletter" value="1" tabindex="20" checked>
                    <span class="ml-10">Je m'abonne à la newsletter</span>
                </label>
            </div>

            <div class="register__validate">
                <input type="submit" name="register_submit" class="btn-couture-plain" value="Je m'inscris" tabindex="21" id="register-form-submit">
                <a href="{{ route('login') }}" class="btn-slider-left mt-3">Déjà inscrit.e ?</a>
            </div>
        </form>
    </section>
@endsection

@section('scripts')
<script type="text/javascript">
    $(function() {
        $('.register__lowtitle--btn').on('click', function() {
            $(this).hide();
            $('.register__address').fadeIn();
        })
    })
</script>
<script type="text/javascript">
    function adaptAddressFields() {
        //Check if data is present in any of the address fields. As soon as one of the fields contains one character, all the required address fields become mandatory
        let filledInputs = 0;
        $('.register_address_field').each(function() {
            filledInputs += $(this).val().length;
        });

        if (filledInputs == 0) {
            $('.register_address_field_mandatory').removeAttr('required');
            $('.register_optionnal_star').hide();
        } else {
            $('.register_address_field_mandatory').attr('required', 'true');
            $('.register_optionnal_star').css('display', 'inline');
        }
    }

    $(function() {
        //Initialize address mandatory status
        adaptAddressFields();

        //Set border color back to initial color upon change when an error has been detected
        $('.input-underline').on('input', function() {
            $(this).css('border-color', '#D9D9D9');
        });

        $('.register_address_field').on('input', function() {
            adaptAddressFields();
        });

        $('#register-form-submit').on('click', function() {
            let firstElWithIssue = '';
            $('#register-form input[required]').each(function() {
                if ($(this).val().length < 2) {
                    $(this).css('border-color', '#D41C1B');
                    if (firstElWithIssue == '') {
                        firstElWithIssue = $(this);
                    }
                }
            });
            if (firstElWithIssue != '') {
                console.log(firstElWithIssue);
                $('html, body').animate({
                   scrollTop: (firstElWithIssue.offset().top - 220)
                 }, 800);
            }
        });
    });
</script>
@endsection

