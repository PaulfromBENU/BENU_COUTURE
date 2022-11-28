@extends('layouts.base_layout')

@section('title')
	{{ __('campaigns.single-halloween-seo-title') }}
@endsection

@section('description')
	{{ __('campaigns.single-halloween-seo-desc') }}
@endsection

@section('breadcrumbs')

@endsection

@section('main-content')
	<div class="single-campaign">
		<section class="single-campaign__header single-campaign__header--halloween scroll-grow-1">
			<div class="single-campaign__header__opacifier scroll-opacity-1" ></div>
			<div class="w-11/12 md:4/5 lg:w-1/2 m-auto single-campaign__header__txt-container">
				<h1 class="single-campaign__header__toptitle">{{ __('campaigns.halloween-main-picture-top-title') }}</h1>
				<h2 class="single-campaign__header__title">{{ __('campaigns.halloween-main-picture-title') }}</h2>

				<div class="single-campaign__header__subtitle text-center scroll-fading-1" style="opacity: 1; text-align: center; margin-bottom: 0;">
					<p>{{ __('campaigns.halloween-scroll-to-see') }}</p>
					<p class="single-campaign__header__subtitle__scroller">
						@svg('icon_benu_couture_scroll_OK')
					</p>
				</div>

				<div class="scroll-appearing-1" style="opacity: 0;">
					<p class="single-campaign__header__txt">
						{{ __('campaigns.halloween-txt-1-1') }}
					</p>

					<p class="single-campaign__header__txt">
						{{ __('campaigns.halloween-txt-2-1') }}
					</p>

					<p class="single-campaign__header__txt">
						{{ __('campaigns.halloween-txt-3-1') }}
					</p>

					<p class="single-campaign__header__txt">
						{{ __('campaigns.halloween-txt-4-1') }}
					</p>

					<p class="single-campaign__header__txt">
						{{ __('campaigns.halloween-txt-5-1') }}
					</p>
				</div>
			</div>
		</section>

		<section class="single-campaign__section-1 benu-container" id="header-end">
			<div class="flex justify-start flex-wrap">
				<div class="single-campaign__section-1__txt flex flex-col lg:justify-end">
					<p>
						{{ __('campaigns.halloween-txt-6-1') }}
					</p>
					<p>
						{{ __('campaigns.halloween-txt-6-2') }}
					</p>
					<p>
						{{ __('campaigns.halloween-txt-6-3') }}
					</p>
					<p>
						{{ __('campaigns.halloween-txt-6-4') }}
					</p>
				</div>
				<div class="single-campaign__section-1__picture">
					<img src="{{ asset('images/pictures/campaigns/halloween-campaign-side-1.jpg') }}" class="single-campaign__section-1__picture__img" />
					<div class="single-campaign__section-1__picture__txt-container flex flex-col justify-center">
						<p class="single-campaign__section-1__picture__txt single-campaign__section-1__picture__txt--base">
							{{ __('campaigns.halloween-txt-6-picture') }}
						</p>
						<p class="single-campaign__section-1__picture__txt single-campaign__section-1__picture__txt--hover single-campaign__section-1__picture__txt--hover--halloween">
							{{ __('campaigns.halloween-txt-6-picture') }}
						</p>
					</div>
				</div>
			</div>
		</section>

		<section class="single-campaign__transition-1 single-campaign__transition-1--halloween scroll-grow-2" id="transition-1">
			<div class="single-campaign__transition-1__opacifier scroll-opacity-2"></div>
			<div class="w-4/5 lg:w-1/2 m-auto single-campaign__transition-1__txt-container flex flex-col justify-center">
				<div>
					<h2 class="single-campaign__transition-1__title">
						{{ __('campaigns.halloween-transition-1-title') }}
					</h2>
					<p class="single-campaign__transition-1__txt">
						{{ __('campaigns.halloween-txt-7-1') }}
						<br/><br/>
						{{ __('campaigns.halloween-txt-7-2') }}
					</p>
				</div>
			</div>
		</section>

		<section class="single-campaign__section-2 benu-container" id="transition-1-end">
			<div class="flex justify-start flex-wrap">
				<div class="single-campaign__section-2__picture">
					<img src="{{ asset('images/pictures/campaigns/halloween-campaign-side-2.jpg') }}" class="single-campaign__section-2__picture__img" />
				</div>
				<div class="single-campaign__section-2__txt flex flex-col lg:justify-end">
					<p>
						{{ __('campaigns.halloween-txt-8-1') }} <a href="https://www.cnbc.com/2019/11/29/psychology-of-black-friday-shopping-phenomenon-and-crowds-explained.html" target="_blank" rel="noreferrer" class="single-campaign__section-3__txt__link">{{ __('campaigns.halloween-txt-8-1-link') }}</a> {{ __('campaigns.halloween-txt-8-2') }}
					</p>
					<p>
						{{ __('campaigns.halloween-txt-8-3') }}
					</p>
					<p>
						{{ __('campaigns.halloween-txt-8-4') }}
					</p>
					<h4>
						{{ __('campaigns.halloween-txt-8-5') }}
					</h4>
					<p>
						{{ __('campaigns.halloween-txt-8-6') }} <a href="https://www.cnbc.com/2019/11/29/psychology-of-black-friday-shopping-phenomenon-and-crowds-explained.html" target="_blank" rel="noreferrer" class="single-campaign__section-3__txt__link">{{ __('campaigns.halloween-txt-8-6-link') }}</a>
					</p>
				</div>
			</div>
		</section>

		<section class="single-campaign__section-3 single-campaign__section-3--halloween scroll-grow-3" id="transition-2">
			<div class="single-campaign__section-3__opacifier scroll-opacity-3"></div>
			<div class="w-11/12 md:4/5 lg:w-1/2 m-auto single-campaign__section-3__txt-container flex flex-col justify-center">
				<h2 class="single-campaign__section-3__title">{{ __('campaigns.halloween-section-3-title') }}</h2>
			</div>
		</section>

		<section class="single-campaign__section-3bis benu-container" id="transition-2-end">
			<div class="flex justify-start flex-wrap">
				<div class="single-campaign__section-3bis__txt flex flex-col lg:justify-end">
					<p class="single-campaign__section-3__txt">
						{{ __('campaigns.halloween-txt-9') }}
					</p>

					<p class="single-campaign__section-3__txt">
						{{ __('campaigns.halloween-txt-10') }}
					</p>

					<p class="single-campaign__section-3__txt">
						{{ __('campaigns.halloween-txt-11') }}
					</p>

					<p class="single-campaign__section-3__txt">
						{{ __('campaigns.halloween-txt-12') }}
					</p>

					<p class="single-campaign__section-3__txt">
						{{ __('campaigns.halloween-txt-13-1') }} <a href="https://www.facebook.com/benuvillageesch/" target="_blank" rel="noreferrer" class="single-campaign__section-3__txt__link">{{ __('campaigns.halloween-txt-13-facebook') }}</a> {{ __('campaigns.halloween-txt-13-2') }} <a href="https://www.instagram.com/benu_village/" target="_blank" rel="noreferrer" class="single-campaign__section-3__txt__link">{{ __('campaigns.halloween-txt-13-insta') }}</a> {{ __('campaigns.halloween-txt-13-3') }}
					</p>
				</div>
				<div class="single-campaign__section-3bis__picture">
					<img src="{{ asset('images/pictures/campaigns/halloween-campaign-side-3.jpg') }}" class="single-campaign__section-3bis__picture__img" />
				</div>
			</div>
		</section>

		<section class="single-campaign__section-4" id="section-3bis-end">
			<blockquote class="single-campaign__section-4__quote w-11/12 md:4/5 lg:w-1/2 m-auto">
				{{ __('campaigns.halloween-quote-1') }} <span class="single-campaign__section-4__quote--highlight">{{ __('campaigns.halloween-quote-2') }}</span> {{ __('campaigns.halloween-quote-3') }}
			</blockquote>
			<div class="single-campaign__section-4__separator"></div>
			<p class="single-campaign__section-4__signature">
				{{ __('campaigns.halloween-quote-signature') }}
			</p>

			<div class="single-campaign__section-4__quote-2">
				<p class="single-campaign__section-4__quote-2__symbols">
					@svg('icon_benu_couture_quotes_OK')
				</p>
				<p class="single-campaign__section-4__quote-2__txt">
					{{ __('campaigns.halloween-quote-txt-1-1') }}
				</p>
				<p class="single-campaign__section-4__quote-2__txt">
					{{ __('campaigns.halloween-quote-txt-2-1') }}
				</p>
				<a class="single-campaign__section-4__quote-2__signature" href="https://www.thedrum.com/opinion/2019/10/11/halloween-black-friday-cyber-monday-what-s-the-next-big-retail-event" target="_blank" rel="noreferrer">
					{{ __('campaigns.halloween-quote-2-signature') }}
				</a>
			</div>
		</section>

		<div class="single-campaign__prev-next">
			
		</div>

		<div class="text-center mb-10">
			<a href="{{ route('campaigns-'.app()->getLocale()) }}" class="btn-slider-left text-lg font-bold m-auto">{{ __('campaigns.all-campaigns-link') }}</a>
		</div>
	</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$(function() {
		let relativeScroll;

		let marginWidth;

		if ($(document).scrollTop() > 0) {

			// Initialization in case of refresh in the middle of the page
			$('.scroll-grow-1').css('border-width', (Math.max(0, marginWidth - 0.5 * $(document).scrollTop())) + 'px');
			$('.scroll-opacity-1').css('opacity', Math.min(0.5, $(document).scrollTop() * 0.01 - 1));
			$('.scroll-fading-1').css('opacity', Math.max(0, 1 - $(document).scrollTop() * 0.01));
			$('.scroll-appearing-1').css('opacity', Math.max(0, $(document).scrollTop() * 0.01) - 1);
			
			if ($(document).scrollTop() > ($('#header-end').offset().top - $(window).height())) {
				$('.scroll-grow-1').css('background-attachment', 'scroll');
			} else {
				$('.scroll-grow-1').css('background-attachment', 'fixed');
			}

			relativeScroll = $(document).scrollTop() - $('#transition-1').offset().top + 0.55 * $(window).height();
			$('.scroll-grow-2').css('border-width', (Math.max(0, marginWidth - 0.2 * relativeScroll)) + 'px');
			$('.scroll-opacity-2').css('opacity', Math.min(0.5, relativeScroll * 0.005 - 1));
			if ($(document).scrollTop() > ($('#transition-1-end').offset().top - $(window).height())) {
				$('.scroll-grow-2').css('background-attachment', 'scroll');
			} else {
				$('.scroll-grow-2').css('background-attachment', 'fixed');
			}

			relativeScroll = $(document).scrollTop() - $('#transition-2').offset().top + 0.55 * $(window).height();
			$('.scroll-grow-3').css('border-width', (Math.max(0, marginWidth - 0.2 * relativeScroll)) + 'px');
			$('.scroll-opacity-3').css('opacity', Math.min(0.5, relativeScroll * 0.005 - 1));
			if ($(document).scrollTop() > ($('#transition-2-end').offset().top - $(window).height())) {
				$('.scroll-grow-3').css('background-attachment', 'scroll');
			} else {
				$('.scroll-grow-3').css('background-attachment', 'fixed');
			}

			if($(window).width() > 1250) {
				relativeScroll = $(document).scrollTop() - $('#transition-1-end').offset().top + $(window).height();
				$('.single-campaign__section-2__picture').css('margin-top', 10 - relativeScroll / 4);
			}
		}

		$(document).on('scroll', function() {
			// Border width initialization based on screen width
			if ($(window).width() > 1250) {
				marginWidth = 60;
			} else {
				marginWidth = 20;
			}

			// Header picture with scroll indication
			if ($(document).scrollTop() < 2 * $(window).height()) {
				$('.scroll-grow-1').css('border-width', (Math.max(0, marginWidth - 0.5 * $(document).scrollTop())) + 'px');
					$('.scroll-opacity-1').css('opacity', Math.min(0.5, $(document).scrollTop() * 0.01 - 1));
					$('.scroll-fading-1').css('opacity', Math.max(0, 1 - $(document).scrollTop() * 0.01));
					$('.scroll-appearing-1').css('opacity', Math.max(0, $(document).scrollTop() * 0.01) - 1);
			}
			if ($(document).scrollTop() > ($('#header-end').offset().top - $(window).height())) {
				if($(window).width() > 1250) {
					$('.scroll-grow-1').css('background-attachment', 'scroll');
					relativeScroll = $(document).scrollTop() - $('#header-end').offset().top + $(window).height();
					$('.single-campaign__section-1__txt').css('padding-bottom', relativeScroll / 4);
				}
			} else if ($(window).width() > 1250) {
				$('.scroll-grow-1').css('background-attachment', 'fixed');
			}

			// First large picture transition
			if ($(document).scrollTop() > ($('#transition-1').offset().top - 0.55 * $(window).height())) {
				relativeScroll = $(document).scrollTop() - $('#transition-1').offset().top + 0.55 * $(window).height();
				$('.scroll-grow-2').css('border-width', (Math.max(0, marginWidth - 0.2 * relativeScroll)) + 'px');
				$('.scroll-opacity-2').css('opacity', Math.min(0.5, relativeScroll * 0.005 - 1));
				// $('.scroll-fading-1').css('opacity', Math.max(0, 1 - relativeScroll * 0.01));
				// $('.scroll-appearing-1').css('opacity', Math.max(0, relativeScroll * 0.01) - 1);
			}
			if ($(document).scrollTop() > ($('#transition-1-end').offset().top - $(window).height())) {
				if ($(window).width() > 1250) {
					$('.scroll-grow-2').css('background-attachment', 'scroll');
				}

				if($(window).width() > 1250) {
					relativeScroll = $(document).scrollTop() - $('#transition-1-end').offset().top + $(window).height();
					$('.single-campaign__section-2__picture').css('margin-top', 10 - relativeScroll / 4);
				}
			} else if ($(window).width() > 1250) {
				$('.scroll-grow-2').css('background-attachment', 'fixed');
			}

			// Second large picture transition
			if ($(document).scrollTop() > ($('#transition-2').offset().top - 0.55 * $(window).height())) {
				relativeScroll = $(document).scrollTop() - $('#transition-2').offset().top + 0.55 * $(window).height();
				$('.scroll-grow-3').css('border-width', (Math.max(0, marginWidth - 0.2 * relativeScroll)) + 'px');
				$('.scroll-opacity-3').css('opacity', Math.min(0.5, relativeScroll * 0.005 - 1));
				// $('.scroll-fading-1').css('opacity', Math.max(0, 1 - relativeScroll * 0.01));
				$('.scroll-appearing-3').css('opacity', Math.max(0, relativeScroll * 0.01) - 1);
			}
			if ($(window).width() > 1250) {
				if ($(document).scrollTop() > ($('#transition-2-end').offset().top - $(window).height())) {
					$('.scroll-grow-3').css('background-attachment', 'scroll');
				} else {
					$('.scroll-grow-3').css('background-attachment', 'fixed');
				}
			}

			// Last section text scroll
			if ($(window).width() > 1250 && $(document).scrollTop() > ($('#transition-2-end').offset().top) - $(window).height()) {
				relativeScroll = $(document).scrollTop() - $('#transition-2-end').offset().top + $(window).height();
				$('.single-campaign__section-3bis__txt').css('padding-bottom', relativeScroll / 4);
			}
		});
	});
</script>
@endsection