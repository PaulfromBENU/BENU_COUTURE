<section class="footer-all">
	<p class="footer-all__txt footer-all__txt--left" id="footer-all-left" style="visibility: hidden;">
		{{ __('footer.all-txt-1-1') }} <strong>{{ __('footer.all-txt-1-2') }}</strong>
	</p>
	<p class="footer-all__txt footer-all__txt--right" id="footer-all-right" style="visibility: hidden;">
		{{ __('footer.all-txt-2-1') }} <strong>BENU COUTURE</strong>
	</p>
	<div class="flex justify-center flex-col md:flex-row w-full md:w-3/4 lg:w-1/2 m-auto">
		<a href="{{ route('full-story-'.app()->getLocale()) }}" class="btn-couture btn-couture--transparent" style="min-width: fit-content;">{{ __('footer.all-story') }}</a>
		<a href="{{ route('header.participate-'.app()->getLocale()) }}" class="btn-couture btn-couture--transparent">{{ __('footer.all-chart') }}</a>
		<a href="{{ route('client-service-'.app()->getLocale(), ['page' => 'faq']) }}" class="btn-couture btn-couture--transparent">{{ __('footer.all-faq') }}</a>
	</div>

	<!-- <div class="footer-all__sponsor">
		<div class="benu-container flex justify-between flex-col lg:flex-row" style="height: 100%;">
			<div class="flex flex-col lg:flex-row justify-start" style="height: 100%;">
				<div class="lg:mr-10 footer-all__sponsor__logo">
					<img src="{{ asset('images/pictures/logo-oeuvre-gdc.jpg') }}">
				</div>
				<div class="text-center lg:text-left flex flex-col justify-center">
					<p>{{ __('welcome.sponsor-thanks-1') }}</p>
				</div>
			</div>
			<div class="text-center lg:text-left flex lg:flex-col justify-center" style="min-width: 200px;">
				<a href="https://www.oeuvre.lu/" target="_blank" class="btn-couture btn-couture-plain--dark-hover" style="margin-bottom: 0;">{{ __('welcome.sponsor-link-1') }}</a>
			</div>
		</div>
	</div> -->
</section>