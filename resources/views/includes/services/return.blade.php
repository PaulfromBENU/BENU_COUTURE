<section class="w-full m-auto return service-panel" id="services-return">
	<h2 class="return__title">{{ __('services.return-title') }}</h2>
	<!-- <p class="return__txt">
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
	</div> -->

	<div class="flex justify-between benu-container">
		<div class="return__index relative">
			<ul class="return__index__menu">
				<li>
					<button class="btn-slider-left font-bold" onclick="document.getElementById('return-chapter-article').scrollIntoView({ behavior: 'smooth', block: 'center' });">
						{{ __('services.return-article') }}
					</button>
				</li>
				<li>
					<button class="btn-slider-left font-bold" onclick="document.getElementById('return-chapter-voucher').scrollIntoView({ behavior: 'smooth', block: 'center' });">
						{{ __('services.return-voucher') }}
					</button>
				</li>
				<li>
					<button class="btn-slider-left font-bold" onclick="document.getElementById('return-chapter-refund').scrollIntoView({ behavior: 'smooth', block: 'center' });">
						{{ __('services.return-refund') }}
					</button>
				</li>
			</ul>
		</div>

		<div class="return__chapters">
			<div class="return__chapter" id="return-chapter-article">
				<h3>{{ __('services.return-article') }}</h3>
				
				<p class="mb-2">
					{!! __('services.return-info-1') !!}
				</p>
				<ul class="mb-2">
					<li class="primary-color font-bold">BENU Village Esch ASBL</li>
					<li>51 rue d'Audun</li>
					<li>L-4018 Esch-sur-Alzette</li>
					<li>Luxembourg</li>
				</ul>
				<p>
					{!! __('services.return-info-1-1') !!}
					<a href="{{  route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-shops')]) }}" class="return__chapter__link">{!! __('services.return-info-1-link') !!}</a> {!! __('services.return-info-1-2') !!}
				</p>
			</div>

			<div class="return__chapter" id="return-chapter-voucher">
				<h3>{{ __('services.return-voucher') }}</h3>
				
				<p class="mb-2">
					{!! __('services.return-info-2') !!}
				</p>
				@livewire('services.return-form-check')
			</div>

			<div class="return__chapter" id="return-chapter-refund">
				<h3>{{ __('services.return-refund') }}</h3>
				
				<p class="mb-2">
					{!! __('services.return-info-3') !!}
				</p>
			</div>
		</div>
	</div>
</section>