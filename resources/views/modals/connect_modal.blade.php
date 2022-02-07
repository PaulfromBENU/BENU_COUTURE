<div class="modal connect-modal" id="connect-modal" style="display: none;">
	<p class="connect-modal__title">Je me connecte à mon compte</p>
	<form method="POST" action="{{ route('login.connect', [app()->getLocale()]) }}">
		@csrf
		<div class="flex justify-start w-full">
			<div class="reactive-label-input w-1/2"> <!-- connect-modal__input-group  -->
				<label for="header-login-email">Adresse e-mail *</label>
				<input type="text" name="email" class="input-underline w-5/6" id="header-login-email" required>
			</div>
			<div class="reactive-label-input w-1/2">
				<label for="header-login-pwd">Mot de passe *</label>
				<input type="password" name="password" class="input-underline w-5/6" id="header-login-pwd" required>
			</div>
		</div>

		<!-- Remember Me -->
        <div class="connect-modal__checkbox">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
            </label>
        </div>

		<div class="flex justify-start w-full">
			<div class="w-1/2"> <!-- connect-modal__input-group -->
				<a href="{{ route('register-'.app()->getLocale()) }}" class="btn-slider-left connect-modal__register">Je crée mon compte ici</a>
			</div>
			<div class="w-1/2"> <!-- connect-modal__input-group -->
				<button type="submit" class="btn-couture connect-modal__btn">Je me connecte</button>
			</div>
		</div>
	</form>
</div>