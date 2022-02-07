<section class="benu-container footer-learnmore flex justify-around">
	<div class="footer-learnmore__block">
		<img src="{{ asset('images/pictures/footer-img-1.png') }}">
		<h3>
			{{ __('footer.more-title-1') }} <span class="primary-color">BENU COUTURE</span>
		</h3>
		<p>
			{{ __('footer.more-txt-1') }}
		</p>
		<div class="text-center">
			<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-shops')]) }}" class="btn-couture">{{ __('footer.more-learn') }}</a>
		</div>
	</div>
	<div class="footer-learnmore__block">
		<img src="{{ asset('images/pictures/footer-img-2.png') }}">
		<h3>
			{{ __('footer.more-title-2') }} <span class="primary-color">BENU COUTURE</span>
		</h3>
		<p>
			{{ __('footer.more-txt-2') }}
		</p>
		<div class="text-center">
			<a href="{{ route('about-'.app()->getLocale()) }}" class="btn-couture">{{ __('footer.more-learn-2') }}</a>
		</div>
	</div>
</section>