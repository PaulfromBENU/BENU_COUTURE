<section class="w-1/2 m-auto text-center care service-panel" id="services-care">
	<h2 class="care__title">{{ __('services.care-title') }}</h2>
	<p class="care__subtitle">
		{{ __('services.care-subtitle') }}
	</p>

	<h4 class="text-center care__grid__title">{{ __('services.care-category-1') }}</h4>
	<div class="care__grid flex justify-between flex-wrap">
		@foreach($wash_recommendations as $wash_recommendation)
		<div class="care__grid__box">
			<div class="care__grid__box__img-container text-center flex flex-col justify-center">
				@svg('care/'.$wash_recommendation->picture)
			</div>
			<p class="care__grid__box__txt m-auto">
				{{ $wash_recommendation->description_fr }}
			</p>
		</div>
		@endforeach
	</div>

	<h4 class="text-center care__grid__title">{{ __('services.care-category-2') }}</h4>
	<div class="care__grid flex justify-between flex-wrap">
		@foreach($dry_recommendations as $dry_recommendation)
		<div class="care__grid__box">
			<div class="care__grid__box__img-container text-center flex flex-col justify-center">
				@svg('care/'.$dry_recommendation->picture)
			</div>
			<p class="care__grid__box__txt m-auto">
				{{ $dry_recommendation->description_fr }}
			</p>
		</div>
		@endforeach
	</div>

	<h4 class="text-center care__grid__title">{{ __('services.care-category-3') }}</h4>
	<div class="care__grid flex justify-between flex-wrap">
		@foreach($iron_recommendations as $iron_recommendation)
		<div class="care__grid__box">
			<div class="care__grid__box__img-container text-center flex flex-col justify-center">
				@svg('care/'.$iron_recommendation->picture)
			</div>
			<p class="care__grid__box__txt m-auto">
				{{ $iron_recommendation->description_fr }}
			</p>
		</div>
		@endforeach
	</div>
</section>