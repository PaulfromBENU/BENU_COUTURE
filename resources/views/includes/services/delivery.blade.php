<section class="text-center delivery service-panel" id="services-delivery">
	<h1 class="delivery__title">{{ __('services.delivery-title') }}</h1>
	
	<div class="flex justify-between benu-container delivery__container">
		<div class="delivery__index relative mobile-hidden tablet-hidden">
			<ul class="delivery__index__menu">
				<li>
					<button id="delivery-chapter-options-link" class="delivery-menu-link btn-slider-left font-bold" onclick="document.getElementById('delivery-chapter-options').scrollIntoView({ behavior: 'smooth', block: 'center' });">
						{{ __('services.delivery-options') }}
					</button>
				</li>
				<li>
					<button id="delivery-chapter-fees-link" class="delivery-menu-link btn-slider-left font-bold" onclick="document.getElementById('delivery-chapter-fees').scrollIntoView({ behavior: 'smooth', block: 'center' });">
						{{ __('services.delivery-fees') }}
					</button>
				</li>
				<li>
					<button id="delivery-chapter-boxes-link" class="delivery-menu-link btn-slider-left font-bold" onclick="document.getElementById('delivery-chapter-boxes').scrollIntoView({ behavior: 'smooth', block: 'center' });">
						{{ __('services.delivery-boxes') }}
					</button>
				</li>
				<li>
					<button id="delivery-chapter-delay-link" class="delivery-menu-link btn-slider-left font-bold" onclick="document.getElementById('delivery-chapter-delay').scrollIntoView({ behavior: 'smooth', block: 'center' });">
						{{ __('services.delivery-delay') }}
					</button>
				</li>
			</ul>
		</div>

		<div class="delivery__chapters">
			<div class="delivery__chapter" id="delivery-chapter-options">
				<h3>{{ __('services.delivery-options') }}</h3>
				
				<p class="mb-2">
					{!! __('services.delivery-details') !!} <a href="{{  route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-shops')]) }}" class="delivery__chapter__link">{!! __('services.delivery-details-link') !!}</a>. 
				</p>
			</div>

			<div class="delivery__chapter" id="delivery-chapter-fees">
				<h3>{{ __('services.delivery-fees') }}</h3>
				
				<p class="mb-2">
					{!! __('services.delivery-costs') !!}
				</p>

				<div class="delivery__chapter__table-container">
					<table class="delivery__chapter__table">
						<tbody>
							<tr class="grid grid-cols-6 mb-2">
								<th>{{ __('services.delivery-weight-in-kg') }}</th>
	<!-- 							<th></th> -->
								<th>Zone 1 (LUX)</th>
								<th>Zone 2 (BE/NL)</th>
								<th>Zone 3 (DE, FR, AU)</th>
								<th>Zone 4 (CH, CZ, DK, FI, IT, PT, SE, SK)</th>
								<th>Zone 5 (ES, GR, HU, IR, IS, LT, NO, UK)</th>
							</tr>
							@foreach($delivery_fees as $delivery_fee)
							<tr class="grid grid-cols-6 delivery__chapter__table__data-rows">
								<td>{{ $delivery_fee->max_weight }}</td>
	<!-- 							<td>0.1</td> -->
								@if($delivery_fee->max_weight < 0.8)
									<td>{{ number_format($delivery_fee->fee_zone_1 + 1, 2) }}</td>
									<td>{{ number_format($delivery_fee->fee_zone_2 + 1, 2) }}</td>
									<td>{{ number_format($delivery_fee->fee_zone_3 + 1, 2) }}</td>
									<td>{{ number_format($delivery_fee->fee_zone_4 + 1, 2) }}</td>
									<td>{{ number_format($delivery_fee->fee_zone_5 + 1, 2) }}</td>
								@else
									<td>{{ number_format($delivery_fee->fee_zone_1 + 2, 2) }}</td>
									<td>{{ number_format($delivery_fee->fee_zone_2 + 2, 2) }}</td>
									<td>{{ number_format($delivery_fee->fee_zone_3 + 2, 2) }}</td>
									<td>{{ number_format($delivery_fee->fee_zone_4 + 2, 2) }}</td>
									<td>{{ number_format($delivery_fee->fee_zone_5 + 2, 2) }}</td>
								@endif
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

			<div class="delivery__chapter" id="delivery-chapter-boxes">
				<h3>{{ __('services.delivery-boxes') }}</h3>
				
				<p>
					{{ __('services.delivery-low-impact') }}
				</p>
			</div>

			<div class="delivery__chapter" id="delivery-chapter-delay">
				<h3>{{ __('services.delivery-delay') }}</h3>
				
				<p class="mb-2">
					{!! __('services.delivery-planning') !!}
				</p>
			</div>
		</div>
	</div>
</section>