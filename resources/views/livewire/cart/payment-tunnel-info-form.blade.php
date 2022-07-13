<form method="POST" wire:submit.prevent="validateInfo" class="payment-tunnel__identification__field">
    @csrf
    <h4>{{ __('cart.info-required') }}</h4>
    <div class="mb-5">
        <div class="flex justify-between">
            <div class="w-5/12">
                <div class="flex justify-start input-group register__form__radio-group">
                    <div class="mr-4">
                        <input type="radio" id="register_gender_male" name="register_gender" value="male" wire:model="gender">
                        <label for="register_gender_male" class="ml-2" style="color: #2E1414;">{{ __('forms.sir') }}</label><br>
                    </div>
                    <div class="mr-4">
                        <input type="radio" id="register_gender_female" name="register_gender" value="female" wire:model="gender">
                        <label for="register_gender_female" class="ml-2" style="color: #2E1414;">{{ __('forms.madam') }}</label><br>
                    </div>
                    <div>
                        <input type="radio" id="register_gender_neutral" name="register_gender" value="neutral" wire:model="gender">
                        <label for="register_gender_neutral" class="ml-2" style="color: #2E1414;">{{ __('forms.neutral') }}</label> 
                    </div>
                </div>
                <div class="input-group reactive-label-input">
                    <label for="first-name">{{ __('forms.first-name') }} *</label>
                    <input type="text" id="first-name" name="first_name" class="input-underline w-full" tabindex="1" minlength="2" maxlength="255" wire:model="first_name">
                    @error('register_first_name')
                        <div class="primary-color">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group reactive-label-input">
                    <label>{{ __('forms.email') }} *</label>
                    <input type="email" name="email" class="input-underline w-full" tabindex="3" minlength="2" maxlength="255" wire:model="email">
                </div>
            </div>

            <div class="w-5/12">
                <div class="input-group reactive-label-input">
                    
                </div>
                <div class="input-group reactive-label-input">
                    <label>{{ __('forms.last-name') }} *</label>
                    <input type="text" name="register_last_name" class="input-underline w-full" tabindex="2" minlength="2" maxlength="255" wire:model="last_name">
                </div>
                <div class="input-group reactive-label-input">
                    <label>{{ __('forms.phone') }} *</label>
                    <input type="text" name="register_phone" class="input-underline w-full" minlength="6" maxlength="30" tabindex="4" wire:model="phone">
                </div>
            </div>
        </div>
    </div>
    <p class="mb-3" style="width: 100%;">
        <strong>{{ __('forms.personnal-data-info') }}</strong>
    </p>
    @if($duplicate_email_info == 1)
    <p class="primary-color">
        <strong>{{ __('forms.e-mail-already-exists-please-confirm') }}</strong>
    </p>
    @endif
    <div class="flex justify-between mt-5">
        <button type="submit" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover mr-5">
            {{ __('cart.info-validate') }}
        </button>
        <a href="{{ route('login-'.app()->getLocale()) }}" class="btn-slider-left mr-3">
            {{ __('cart.info-connect') }}
        </a>
    </div>
</form>