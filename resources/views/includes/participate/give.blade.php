<section class="w-11/12 lg:w-2/3 m-auto text-center participate-give participate-panel" id="participate-give">
	<h2 class="participate-give__title">{{ __('participate.give-title') }}</h2>

	<div class="participate-give__content">
		<p class="participate-give__content__txt">
			{{ __('participate.give-content-1-1') }} <a href="#" class="primary-color hover:text-gray-800 transition">{{ __('participate.give-content-1-1-link') }}</a>
		</p>
		<p class="participate-give__content__txt">
			{{ __('participate.give-content-1-2') }} <a href="#" class="primary-color hover:text-gray-800 transition">{{ __('participate.give-content-1-2-link') }}</a>
		</p>
<!-- 		<div class="text-center mt-5 pt-5">
			<a href="#" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover">{{ __('participate.give-link-1') }}</a>
		</div> -->
	</div>

	<div class="participate-give__content">
		<p class="participate-partnership__subtitle">
			{{ __('participate.give-subtitle-2') }}
		</p>
		<p class="participate-give__content__txt">
			{{ __('participate.give-content-2-1') }}
		</p>
		<p class="participate-give__content__txt">
			{{ __('participate.give-content-2-2') }}
		</p>
		<p class="participate-give__content__txt">
			{{ __('participate.give-content-2-3') }}
		</p>
		<p class="participate-give__content__txt">
			{{ __('participate.give-content-2-4') }}
		</p>
		<p class="participate-give__content__txt">
			{{ __('participate.give-content-2-5') }}
		</p>
		<div class="text-left mt-5 pt-5">
			<a href="#" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover">{{ __('participate.give-link-2') }}</a>
		</div>
	</div>

	<h2 class="participate-give__title pt-10 mt-10">{{ __('participate.give-title-2') }}</h2>
	<div class="participate-give__content">
		<p class="participate-give__content__txt">
			{!! __('participate.give-content-3-1') !!}
		</p>
	</div>


	<div class="participate-give__collect-box">
		<h3>
			BENU Shop Esch-sur-Alzette
		</h3>
		<div class="participate-give__collect-box__details">
			<p class="mb-3">
				<strong>{!! __('services.shops-address') !!} : </strong>  51 rue d'Audun, 4018 Esch-sur-Alzette, Luxembourg
			</p>
			<div class="flex flex-wrap">
				<p class="w-full lg:w-3/5 mb-3 lg:mb-0">
					<strong>{!! __('services.shops-phone') !!} :</strong> +352 27 91 19 49
				</p>
				<p class="w-full lg:w-2/5">
					<strong>{!! __('services.shops-website') !!} : </strong> <a href="https://www.benu.lu" target="_blank">www.benu.lu</a>
				</p>
			</div>
		</div>
		<div class="flex justify-around flex-wrap">
			<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-shops')]) }}" class="inline-block btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover mt-2 mb-2">{!! __('participate.give-opening-time') !!}</a>
			<a href="tel:+35227911949" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover inline-block mobile-only mt-2 mb-2">{!! __('participate.give-call-this-number') !!}</a>
		</div>
	</div>

	<div class="participate-give__collect-box">
		<h3>
			Gérard Kieffer
		</h3>
		<div class="participate-give__collect-box__details">
			<p class="mb-3">
				<strong>{!! __('services.shops-address') !!} : </strong>  53, rue de Remich, L- 5330 Moutfort, Luxembourg
			</p>
			<div class="flex">
				<p class="w-3/5">
					<strong>{!! __('services.shops-phone') !!} :</strong> +352 691 35 87 13
				</p>
			</div>
		</div>
		<div class="flex justify-around flex-wrap">
			<a href="tel:+352691358713" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover inline-block mobile-only mt-2 mb-2">{!! __('participate.give-call-this-number') !!}</a>
		</div>
	</div>

	<div class="participate-give__collect-box">
		<h3>
			Jean-Marie Kieffer
		</h3>
		<div class="participate-give__collect-box__details">
			<p class="mb-3">
				<strong>{!! __('services.shops-address') !!} : </strong>  4, Ancien Chemin d'Osweiler, L-6469 Echternach, Luxembourg
			</p>
			<div class="flex">
				<p class="w-3/5">
					<strong>{!! __('services.shops-phone') !!} :</strong> +352 72 82 42
				</p>
			</div>
		</div>
		<div class="flex justify-around flex-wrap">
			<a href="tel:+352728242" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover inline-block mobile-only mt-2 mb-2">{!! __('participate.give-call-this-number') !!}</a>
		</div>
	</div>

	<div class="participate-give__collect-box">
		<h3>
			Executive Textil Atelier - Sylvie Hamus
		</h3>
		<div class="participate-give__collect-box__details">
			<p class="mb-3">
				<strong>{!! __('services.shops-address') !!} : </strong>  49, rue Victor Muller-Fromes, L-9261 Diekirch, Luxembourg
			</p>
			<div class="flex">
				<p class="w-3/5">
					<strong>{!! __('services.shops-phone') !!} :</strong> +352 26 80 32 50
				</p>
			</div>
		</div>
		<div class="flex justify-around flex-wrap">
			<a href="tel:+35226803250" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover inline-block mobile-only mt-2 mb-2">{!! __('participate.give-call-this-number') !!}</a>
		</div>
	</div>

	<div class="participate-give__collect-box">
		<h3>
			Naturpark Our - Christian Kayser
		</h3>
		<div class="participate-give__collect-box__details">
			<p class="mb-3">
				<strong>{!! __('services.shops-address') !!} : </strong>  12, Parc, L-9836 Hosingen, Luxembourg
			</p>
			<div class="flex">
				<p class="w-3/5">
					<strong>{!! __('services.shops-phone') !!} :</strong> +352 90 81 88-1
				</p>
				<p class="w-full lg:w-2/5">
					<strong>{!! __('services.shops-website') !!} : </strong> <a href="https://naturpark-our.lu" target="_blank">naturpark-our.lu</a>
				</p>
			</div>
		</div>
		<div class="flex justify-around flex-wrap">
			<a href="tel:+3529081881" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover inline-block mobile-only mt-2 mb-2">{!! __('participate.give-call-this-number') !!}</a>
		</div>
	</div>

	<div class="participate-give__collect-box">
		<h3>
			BENU VILLAGE ESCH asbl - Georges Kieffer
		</h3>
		<div class="participate-give__collect-box__details">
			<p class="mb-3">
				<strong>{!! __('services.shops-address') !!} : </strong>  50, rue des Celtes, L-1318 Luxembourg, Luxembourg
			</p>
			<div class="flex">
				<p class="w-3/5">
					<strong>{!! __('services.shops-phone') !!} :</strong> +352 621 18 81 05
				</p>
			</div>
		</div>
		<div class="flex justify-around flex-wrap">
			<a href="tel:+352621188105" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover inline-block mobile-only mt-2 mb-2">{!! __('participate.give-call-this-number') !!}</a>
		</div>
	</div>
</section>