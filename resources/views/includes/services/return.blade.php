<section class="w-1/2 m-auto text-center return service-panel" id="services-return">
	<h2 class="return__title">{{ __('services.return-title') }}</h2>
	<p class="return__txt">
		{{ __('services.return-txt-1') }}
	</p>
	<div class="return__highlight">
		{{ __('services.return-highlighted-1') }}
	</div>
	<p class="return__txt">
		{{ __('services.return-txt-2') }}
	</p>
	<div class="text-center return__link">
		<a href="{{ route('client-service-'.app()->getLocale(), ['page' => 'contact']) }}" class="btn-couture m-auto">
			{{ __('services.return-contact') }}
		</a>
	</div>
</section>