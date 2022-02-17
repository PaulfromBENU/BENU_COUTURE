<section class="model-articles benu-container" id="model-articles">
	<h2>{{ __('vouchers.options-title') }}</h2>
	<div class="model-articles__filters flex">
		<div class="model-articles__filters__filter">
			<p>{{ __('vouchers.options-no-filter') }}</p>
		</div>
	</div>

	<div class="model-articles__list flex flex-wrap justify-start">
		@foreach($vouchers as $voucher)
			@include('includes.components.voucher_overview')
		@endforeach
	</div>
</section>