<form method="POST" action="" id="contact-form" class="contact__form__form w-full m-auto mb-10" wire:submit.prevent="sendMessage" @if($safety_check == 0) onsubmit="event.preventDefault();" @endif>
    @csrf
    <div class="flex justify-between">
        <div class="w-5/12">
            <div class="flex justify-between input-group register__form__radio-group">
                <input type="radio" id="contact_gender_male" name="gender" value="male" wire:model="gender">
                <label for="contact_gender_male">Monsieur</label><br>
                <input type="radio" id="contact_gender_female" name="gender" value="female" wire:model="gender">
                <label for="contact_gender_female">Madame</label><br>
                <input type="radio" id="contact_gender_neutral" name="gender" value="neutral" wire:model="gender">
                <label for="contact_gender_neutral">Non genré</label> 
            </div>
            <div class="input-group reactive-label-input">
                @if($first_name != "")
                    <label for="contact_first_name" class="reactive-label-input__label-active">Prénom *</label>
                @else
                    <label for="contact_first_name">Prénom *</label>
                @endif
                <input type="text" id="contact_first_name" name="first_name" class="input-underline w-full" tabindex="1" minlength="2" maxlength="255" required wire:model.defer="first_name">
                @error('first_name')
                    <div class="primary-color">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group reactive-label-input">
                @if($contact_email != "")
                    <label class="reactive-label-input__label-active">Adresse e-mail *</label>
                @else
                    <label>Adresse e-mail *</label>
                @endif
                <input type="email" name="contact_email" class="input-underline w-full" tabindex="3" minlength="2" maxlength="255" required wire:model.defer="contact_email">
            </div>
        </div>

        <div class="w-5/12">
            <div class="input-group reactive-label-input">
                @if($company != "")
                    <label class="reactive-label-input__label-active">Société, organisation</label>
                @else
                    <label>Société, organisation</label>
                @endif
                <input type="text" name="company" class="input-underline w-full" maxlength="100" wire:model.defer="company">
            </div>
            <div class="input-group reactive-label-input">
                @if($last_name != "")
                    <label class="reactive-label-input__label-active">Nom *</label>
                @else
                    <label>Nom *</label>
                @endif
                <input type="text" name="last_name" class="input-underline w-full" tabindex="2" minlength="2" maxlength="255" required wire:model="last_name">
            </div>
            <div class="input-group reactive-label-input">
                @if($phone != "")
                    <label class="reactive-label-input__label-active">Numéro de téléphone (avec indicatif)</label>
                @else
                    <label>Numéro de téléphone (avec indicatif)</label>
                @endif
                <input type="text" name="phone" class="input-underline w-full" minlength="6" maxlength="30" tabindex="4" wire:model="phone">
            </div>
        </div>
    </div>
    <div class="mt-10 mb-10" style="position: relative;">
        <label style="position: absolute; top: 10px; left: 20px;">Message (max 2000 caractères) *</label>
        <textarea minlength="1" maxlength="2000" rows="8" class="w-full" tabindex="5" wire:model="message">
                
        </textarea>
        <p class="contact__form__form__mandatory">
            * Champs obligatoires
        </p>
        <div class="register__options">
            <label for="contact_agreement" class="inline-flex items-center contact__form__form__select">
                <input id="contact_agreement" type="checkbox" class="rounded border-gray-300 text-red-600 shadow-sm" name="conditions_ok" value="1" tabindex="6" style="margin-top: 2px;" wire:model="conditions_ok" wire:click="restoreButton">
                <span class="ml-8">En utilisant ce formulaire, je confirme la sauvegarde et le traitement de mes données par ce site *</span>
            </label>
        </div>
    </div>

    @if(!$message_sent)
        @if(!$safety_check)
        <div class="contact__form__form__security flex w-2/3 m-auto">
            <p>Sécurité&nbsp;: combien font {{ $checksum_number_1 }} + {{ $checksum_number_2 }}&nbsp;?</p>
            <input type="text" minlength="1" maxlength="2" class="ml-8 input-underline" required wire:model.defer="user_sum">
            <div wire:click="checkSum" class="ml-8 contact__form__form__security__btn hover:underline">Vérifier</div>
        </div>
        @elseif($safety_check == 1)
        <input type="submit" name="contact_submit" value="Envoyer mon message" class="btn-couture-plain" style="height: 50px;">
        @endif
    @else
        @if($message_valid)
            <div class="contact__form__valid">
                {{ $submit_feedback }}
            </div>
        @else
            <div class="contact__form__invalid">
                {{ $submit_feedback }}
            </div>
        @endif
    @endif
</form>
