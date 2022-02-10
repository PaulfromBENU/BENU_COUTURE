<section class="model-articles benu-container" id="model-articles">
	<h2>Les bons d'achat</h2>
	<div class="model-articles__filters flex">
		<div class="model-articles__filters__filter">
			<p>Pas de filtres disponibles</p>
		</div>
	</div>

	<div class="model-articles__list flex flex-wrap justify-start">
		@foreach($vouchers as $voucher)
			@include('includes.components.voucher_overview')
		@endforeach
	</div>
</section>