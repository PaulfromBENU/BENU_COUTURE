<div class="modal connect-modal" id="connect-modal" style="display: none;">
	<p class="connect-modal__title">Je me connecte à mon compte</p>
	<form method="POST" action="{{ route('login') }}">
		@csrf
		<div class="flex justify-start">
			<div class="connect-modal__input-group">
				<label for="header-login-email">Adresse e-mail *</label>
				<input type="text" name="login-email" class="input-underline" id="header-login-email" required>
			</div>
			<div class="connect-modal__input-group">
				<label for="header-login-pwd">Mot de passe *</label>
				<input type="password" name="login-pwd" class="input-underline" id="header-login-pwd" required>
			</div>
		</div>

		<div class="flex justify-start">
			<div class="connect-modal__input-group">
				<a href="{{ route('register') }}" class="btn-slider-left connect-modal__register">Je crée mon compte ici</a>
			</div>
			<div class="connect-modal__input-group">
				<button type="submit" class="btn-couture connect-modal__btn">Je me connecte</button>
			</div>
		</div>
	</form>
</div>