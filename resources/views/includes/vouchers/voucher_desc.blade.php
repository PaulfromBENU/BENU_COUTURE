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
		
		<div class="flex model-pres__desc__seemore">
			<a onclick='document.getElementById("voucher-options").scrollIntoView({ behavior: "smooth", block: "start" });' class="flex">
				{{ __('vouchers.desc-link') }} @svg('model_arrow_down')
			</a>
		</div>
	</div>
</section>