@extends('layouts.base_layout')

@section('title')
	{{ __('about.seo-title') }}
@endsection

@section('description')
	{{ __('about.seo-description') }}
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs pattern-bg">
		<div class="benu-container breadcrumbs__content flex justify-start">
			<a href="{{ route('home', [app()->getLocale()]) }}">{{ __('breadcrumbs.home') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('full-story-'.app()->getLocale()) }}" class="primary-color"><strong>{{ __('breadcrumbs.about') }}</strong></a>
		</div>
	</div>
@endsection

@section('main-content')
<section class="w-3/5 m-auto full-story mb-10 pb-10 benu-container">
	<h2 class="full-story__subtitle">{{ __('about.subtitle-top') }}</h2>
	<h1 class="full-story__title">{{ __('about.title-top') }}</h1>

	<h3 id="about-chapter-creations" class="full-story__section-title">
		{{ __('about.section-title-1') }}
	</h3>

	<div class="full-story__general flex justify-between">
		<div class="full-story__general__menu-container">
			<div class="full-story__general__menu-container__menu">
				<ul>
					<li>
						<button class="btn-slider-left text-lg font-bold" onclick="document.getElementById('about-chapter-creations').scrollIntoView({ behavior: 'smooth', block: 'center' });">{{ __('about.side-menu-1') }}</button>
					</li>
					<li>
						<button class="btn-slider-left text-lg font-bold" onclick="document.getElementById('about-chapter-services').scrollIntoView({ behavior: 'smooth', block: 'center' });">{{ __('about.side-menu-2') }}</button>
					</li>
					<li>
						<button class="btn-slider-left text-lg font-bold" onclick="document.getElementById('about-chapter-team').scrollIntoView({ behavior: 'smooth', block: 'center' });">{{ __('about.side-menu-3') }}</button>
					</li>
					<li>
						<button class="btn-slider-left text-lg font-bold" onclick="document.getElementById('about-chapter-materials').scrollIntoView({ behavior: 'smooth', block: 'center' });">{{ __('about.side-menu-4') }}</button>
					</li>
				</ul>
			</div>
		</div>

		<div class="full-story__general__content">
			<div class="full-story__general__content__slider">	
				<div class="full-story__general__content__slider__cards flex justify-start">
					@for($i = 1; $i <= 11; $i++)
					<div class="full-story__general__content__slider__cards__card" @if($i == 1) id="slider-card-1" @endif>
						<img src="{{ asset('images/pictures/about/about-slider-'.$i.'.jpg') }}" />
						<div class="full-story__general__content__slider__cards__card__footer flex justify-start">
							<div class="flex flex-col justify-center">
								<p class="full-story__general__content__slider__cards__card__footer--number">
									{{ $i }}
								</p>
							</div>
							<div class="full-story__general__content__slider__cards__card__footer--txt flex flex-col justify-center">
								<p>
									{{ __('about.card-txt-'.$i) }}
								</p>
							</div>
						</div>
					</div>
					@endfor
				</div>
			</div>
			<div class="full-story__general__content__slider__bar flex justify-between">
				<div class="flex justify-start w-1/5">
					<div class="full-story__general__content__slider__bar__btn full-story__general__content__slider__bar__btn--left">
						@svg('chevron-down', 'full-story__general__content__slider__bar__svg')
					</div>
					<div class="full-story__general__content__slider__bar__btn full-story__general__content__slider__bar__btn--right">
						@svg('chevron-down', 'full-story__general__content__slider__bar__svg')
					</div>
				</div>
				<div class="full-story__general__content__slider__bar__scroll w-4/5">
					<div class="absolute full-story__general__content__slider__bar__scroll--red"></div>
				</div>
			</div>


			<h3 id="about-chapter-services" class="full-story__section-title">
				{{ __('about.section-title-2') }}
			</h3>
			<div class="full-story__general__content__info-section">
				<div class="full-story__general__content__info-section__picture">
					<img src="{{ asset('images/pictures/about/about-transition-1.jpg') }}">
				</div>
				<div class="full-story__general__content__info-section__txt">
					<h4>{{ __('about.section-2-subtitle-1') }}</h4>

					<p class="full-story__general__content__info-section__txt__paragraph">
						{{ __('about.section-2-txt-1') }}
					</p>

					<div class="flex justify-between flex-wrap mb-10">
						<div class="w-2/5">
							<img src="{{ asset('images/pictures/about/about-content-1.jpg') }}">
						</div>
						<div class="w-3/5 pl-5">
							<h5>
								{{ __('about.section-2-lowtitle-1') }}
							</h5>
							<p class="full-story__general__content__info-section__txt__paragraph">
								{{ __('about.section-2-txt-2-1') }}
							</p>
							<p class="full-story__general__content__info-section__txt__paragraph">
								{{ __('about.section-2-txt-2-2') }}
							</p>
							<p class="full-story__general__content__info-section__txt__paragraph">
								{{ __('about.section-2-txt-2-3') }} <a href="#" class="primary-color hover:text-gray-800 transition">{{ __('about.section-2-txt-2-link-1') }}</a> {{ __('about.section-2-txt-2-4') }} <a href="#" class="primary-color hover:text-gray-800 transition">{{ __('about.section-2-txt-2-link-2') }}</a> {{ __('about.section-2-txt-2-5') }}
							</p>
						</div>
					</div>

					<div class="flex justify-between flex-wrap pt-10">
						<div class="w-3/5 pr-5">
							<h4>{{ __('about.section-2-subtitle-2') }}</h4>
							<p class="full-story__general__content__info-section__txt__paragraph">
								{{ __('about.section-2-txt-3-1') }}
							</p>
							<p class="full-story__general__content__info-section__txt__paragraph">
								{{ __('about.section-2-txt-3-2') }}
							</p>
							<p class="full-story__general__content__info-section__txt__paragraph">
								{{ __('about.section-2-txt-3-3') }} <a href="#" class="primary-color hover:text-gray-800 transition">{{ __('about.section-2-txt-3-link') }}</a>
							</p>
						</div>
						<div class="w-2/5">
							<img src="{{ asset('images/pictures/about/about-content-2.jpg') }}">
						</div>
					</div>
				</div>

				<div class="full-story__general__content__info-section__transition">
					<img src="{{ asset('images/pictures/about/about-transition-2.jpg') }}">
				</div>

				<div class="full-story__general__content__info-section__txt">
					<h4>{{ __('about.section-2-subtitle-3') }}</h4>

					<p class="full-story__general__content__info-section__txt__paragraph">
						{{ __('about.section-2-txt-4-1') }}
					</p>
					<p class="full-story__general__content__info-section__txt__paragraph">
						{{ __('about.section-2-txt-4-2') }}
					</p>

					<div class="flex justify-between flex-wrap mb-10">
						<div class="w-2/5">
							<img src="{{ asset('images/pictures/about/about-content-3.jpg') }}">
						</div>
						<div class="w-3/5 pl-5">
							<h4>{{ __('about.section-2-subtitle-4') }}</h4>
							<p class="full-story__general__content__info-section__txt__paragraph">
								{{ __('about.section-2-txt-5-1') }}
							</p>
							<p class="full-story__general__content__info-section__txt__paragraph">
								{{ __('about.section-2-txt-5-2') }} <a href="#" class="primary-color hover:text-gray-800 transition">{{ __('about.section-2-txt-5-link') }}</a>
							</p>
						</div>
					</div>

					<h4>{{ __('about.section-2-subtitle-5') }}</h4>

					<p class="full-story__general__content__info-section__txt__paragraph">
						{{ __('about.section-2-txt-6') }}
					</p>

					<p class="full-story__general__content__info-section__txt__paragraph">
						{{ __('about.section-2-txt-7') }}
					</p>

					<p class="full-story__general__content__info-section__txt__highlight">
						{{ __('about.section-2-txt-8') }}
					</p>

					<p class="full-story__general__content__info-section__txt__paragraph">
						{{ __('about.section-2-txt-9') }}
					</p>

					<p class="text-center mb-10">
						<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-contact')]) }}" target="_blank" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover">{{ __('about.section-2-btn-contact') }}</a>
					</p>
					
				</div>
			</div>


			<h3 id="about-chapter-team" class="full-story__section-title">
				{{ __('about.section-title-3') }}
			</h3>


			<div class="full-story__general__content__info-section">
				<div class="full-story__general__content__info-section__picture">
					<img src="{{ asset('images/pictures/about/about-transition-3.jpg') }}">
				</div>
				<div class="full-story__general__content__info-section__txt">
					<p class="full-story__general__content__info-section__txt__paragraph">
						{{ __('about.section-3-txt-1') }}
					</p>

					<p class="w-1/2 m-auto text-center mb-10">
						<img src="{{ asset('images/pictures/about/about-content-4.jpg') }}">
					</p>

					<div class="flex justify-between flex-wrap mb-10">
						<div class="w-2/5">
							<img src="{{ asset('images/pictures/about/about-content-5.jpg') }}">
						</div>
						<div class="w-3/5 pl-5">
							<p class="full-story__general__content__info-section__txt__paragraph">
								{{ __('about.section-3-txt-2-1') }}
							</p>
							<p class="full-story__general__content__info-section__txt__paragraph">
								{{ __('about.section-3-txt-2-2') }}
							</p>
						</div>
					</div>

					<div class="flex justify-between flex-wrap pt-10">
						<div class="w-3/5 pr-5">
							<p class="full-story__general__content__info-section__txt__paragraph">
								{{ __('about.section-3-txt-3-1') }} <a href="#" class="primary-color hover:text-gray-800 transition">{{ __('about.section-3-txt-3-link') }}</a>
							</p>
							<p class="full-story__general__content__info-section__txt__paragraph">
								{{ __('about.section-3-txt-3-2') }}
							</p>
							<p class="full-story__general__content__info-section__txt__paragraph">
								{{ __('about.section-3-txt-3-3') }}
							</p>
						</div>
						<div class="w-2/5">
							<img src="{{ asset('images/pictures/about/about-content-6.jpg') }}">
						</div>
					</div>
				</div>
				<p class="text-center mt-10 mb-10">
					<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-contact')]) }}" target="_blank" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover">{{ __('about.section-3-btn-contact') }}</a>
				</p>
			</div>
		</div>
	</div>

</section>
@endsection

@section('scripts')
<script type="text/javascript">
	$(function() {
		$('.full-story__general__content__slider').animate({scrollLeft: 0}, 'fast');
		$('.full-story__general__content__slider__bar__scroll--red').css('left', 0);

		$('.full-story__general__content__slider__bar__btn--right').on('click', function(e) {
			if (!$('.full-story__general__content__slider').is(':animated')) {
				let leftPos = $('.full-story__general__content__slider').scrollLeft();
				let fullSliderWidth = $('.full-story__general__content__slider').get(0).scrollWidth - $('.full-story__general__content__slider').width();
	  			$('.full-story__general__content__slider').animate({scrollLeft: leftPos + fullSliderWidth / 4}, 'fast');

	  			let leftPosScroll = parseInt($('.full-story__general__content__slider__bar__scroll--red').css('left'));
	  			let fullBarWidth = $('.full-story__general__content__slider__bar__scroll').width();
	  			let redBarWidth = fullBarWidth / 4;
	  			if (leftPosScroll < (3 * redBarWidth - 20)) {//Margin to avoid bugs
	  				// $('.full-story__general__content__slider__bar__scroll--red').animate({left: leftPosScroll + redBarWidth}, 'fast');
	  			} else {
	  				$('.full-story__general__content__slider__bar__scroll--red').css('left', fullBarWidth * 0.75);
	  			}
	  		}
	 	});

	 	$('.full-story__general__content__slider__bar__btn--left').on('click', function(e) {
	 		if (!$('.full-story__general__content__slider').is(':animated')) {
				let leftPos = $('.full-story__general__content__slider').scrollLeft();
	  			let fullSliderWidth = $('.full-story__general__content__slider').get(0).scrollWidth - $('.full-story__general__content__slider').width();
	  			$('.full-story__general__content__slider').animate({scrollLeft: leftPos - fullSliderWidth / 4}, 'fast');

	  			let leftPosScroll = $('.full-story__general__content__slider__bar__scroll--red').position().left;
	  			let fullBarWidth = $('.full-story__general__content__slider__bar__scroll').width();
	  			let redBarWidth = fullBarWidth / 4;
	  			// console.log(leftPosScroll, $('.full-story__general__content__slider__bar__scroll').width());
	  			if (leftPosScroll >= (fullBarWidth / 4) + 20) {
	  				// $('.full-story__general__content__slider__bar__scroll--red').animate({left: leftPosScroll - fullBarWidth / 4}, 'fast');
	  			} else {
	  				$('.full-story__general__content__slider__bar__scroll--red').css('left', 0);
	  			}
	  		}
	 	});

	 	$('.full-story__general__content__slider').on('scroll', function(e) {
	 		let leftPos = $('.full-story__general__content__slider').scrollLeft();
			let fullSliderWidth = $('.full-story__general__content__slider').get(0).scrollWidth - $('.full-story__general__content__slider').width();
			let ratio = leftPos / fullSliderWidth;

 			console.log(ratio);
 			$('.full-story__general__content__slider__bar__scroll--red').css('left', $('.full-story__general__content__slider__bar__scroll').width() * ratio * 0.75);
 			console.log($('.full-story__general__content__slider__bar__scroll--red').css('left'));

	 	})
	});
</script>
@endsection