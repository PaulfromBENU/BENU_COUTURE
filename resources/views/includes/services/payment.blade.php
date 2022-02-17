<section class="w-1/2 m-auto text-center payment service-panel" id="services-payment">
	<h2 class="payment__title">{{ __('services.payment-title') }}</h2>
	<p class="payment__subtitle">
		{{ __('services.payment-subtitle') }}
	</p>

	<div class="payment__option">
		<h3 class="payment__option__title">{{ __('services.payment-option-1-title') }}</h3>
		<img src="{{ asset('images/pictures/services_payment_cards.png') }}">
		<p class="payment__option__txt">
			{{ __('services.payment-option-1-desc') }}
		</p>
	</div>

	<div class="payment__option">
		<h3 class="payment__option__title">{{ __('services.payment-option-2-title') }}</h3>
		<img src="{{ asset('images/pictures/services_payment_paypal.png') }}">
		<p class="payment__option__txt">
			{{ __('services.payment-option-2-desc') }}
		</p>
	</div>

	<div class="payment__option">
		<h3 class="payment__option__title">{{ __('services.payment-option-3-title') }}</h3>
		<img src="{{ asset('images/pictures/services_payment_digicash.png') }}">
		<p class="payment__option__txt">
			{{ __('services.payment-option-3-desc') }}
		</p>
	</div>

	<div class="payment__option">
		<h3 class="payment__option__title">{{ __('services.payment-option-4-title') }}</h3>
		<img src="{{ asset('images/pictures/services_payment_transfer.png') }}">
		<p class="payment__option__txt">
			{{ __('services.payment-option-4-desc') }}
		</p>
	</div>
</section>