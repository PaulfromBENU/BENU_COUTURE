<section class="footer-all">
	<p class="footer-all__txt footer-all__txt--left">
		{{ __('footer.all-txt-1-1') }} <strong>{{ __('footer.all-txt-1-2') }}</strong>
	</p>
	<p class="footer-all__txt footer-all__txt--right">
		{{ __('footer.all-txt-2-1') }} <strong>BENU COUTURE</strong>
	</p>
	<div class="flex justify-center w-1/2 m-auto">
		<a href="{{ route('full-story-'.app()->getLocale()) }}" class="btn-couture btn-couture--transparent">{{ __('footer.all-story') }}</a>
		<a href="#" class="btn-couture btn-couture--transparent">{{ __('footer.all-chart') }}</a>
		<a href="{{ route('client-service-'.app()->getLocale(), ['page' => 'faq']) }}" class="btn-couture btn-couture--transparent">{{ __('footer.all-faq') }}</a>
	</div>
</section>