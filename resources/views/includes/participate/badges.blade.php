<section class="w-2/3 m-auto text-center participate-badges participate-panel" id="participate-badges">
	<h2 class="participate-badges__title">{{ __('participate.badges-title') }}</h2>
	<p class="participate-badges__content">
		{{ __('participate.badges-content-1') }}
	</p>
	<p class="participate-badges__badge">
		@svg('icon_benu_couture_top_user_2022_OK')
	</p>
	<p class="participate-badges__content">
		{{ __('participate.badges-content-2') }}
	</p>
	<p class="participate-badges__badge">
		@svg('icon_benu_couture_brain_2022_OK')
	</p>
	<p class="participate-badges__content">
		{{ __('participate.badges-content-3') }}
	</p>
	<div class="text-center mt-5 pt-5">
		<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-contact')]) }}" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover">{{ __('participate.badges-link') }}</a>
	</div>
</section>