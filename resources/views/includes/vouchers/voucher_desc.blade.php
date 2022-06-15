<section class="flex justify-between model-pres benu-container">
	<div class="model-pres__img-container">
		<img src="{{ asset('images/pictures/vouchers_img.png') }}">
	</div>
	<div class="model-pres__desc">
		<h1 class="model-pres__desc__title">{{ __('vouchers.desc-title') }}</h1>
		<p class="model-pres__desc__txt-vouchers">
			{{ __('vouchers.desc-txt-1') }}
		</p>
		<p class="model-pres__desc__txt-vouchers">
			{{ __('vouchers.desc-txt-2') }}
		</p>
		<p class="model-pres__desc__txt-vouchers">
			{{ __('vouchers.desc-txt-3') }}
		</p>

		<div>
			<p class="model-pres__desc__txt" style="margin-bottom: 10px;">
				{!! __('vouchers.link-explanation') !!}
			</p>
			@php
			$localized_links = [
				'en' => 'https://en.wikipedia.org/wiki/Lesser_bilby',
				'fr' => 'https://fr.wikipedia.org/wiki/Macrotis_leucura',
				'de' => 'https://de.wikipedia.org/wiki/Kleiner_Kaninchennasenbeutler',
				'lu' => 'https://de.wikipedia.org/wiki/Kleiner_Kaninchennasenbeutler',
			];
			@endphp
			<p class="model-pres__desc__link">
				<a href="{{ $localized_links[app()->getLocale()] }}" target="_blank" class="btn-slider-left">{{ __('vouchers.model-origins') }} BILBY</a>
			</p>
		</div>
		
		<div class="flex model-pres__desc__seemore">
			<a onclick='document.getElementById("voucher-options").scrollIntoView({ behavior: "smooth", block: "start" });' class="flex">
				{{ __('vouchers.desc-link') }} @svg('model_arrow_down')
			</a>
		</div>
	</div>
</section>