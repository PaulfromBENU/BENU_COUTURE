<section class="w-3/4 m-auto text-center shops service-panel" id="services-shops">
	<h2 class="shops__title">Points de vente</h2>

	@foreach($shops_benu as $shop)
	<div class="shops__card flex justify-start">
		<div class="shops__card__img-container">
			<img src="{{ asset('images/pictures/shops/'.$shop->picture) }}">
		</div>
		<div class="shops__card__txt-container">
			<div class="flex justify-between">
				<h3 class="shops__card__title">{{ $shop->name }}</h3>
				<p>
					<a href="{{ route('model-'.app()->getLocale()) }}" class="btn-couture-plain">Voir tous les articles</a>
				</p>
			</div>
			<p class="shops__card__desc">
				{{ $shop->$desc_query }}
			</p>
			<div class="text-left shops__card__highlight">
				<p class="mb-2">
					<strong>Adresse&nbsp;:</strong> {{ $shop->address }}
				</p>
				<div class="flex justify-start">
					<p class="w-1/2">
						<strong>Téléphone&nbsp;:</strong> {{ $shop->phone }}
					</p>
					<p>
						<strong>Site&nbsp;:</strong> <span class="primary-color"><a href="https://{{ $shop->website }}" class="shops__card__link" target="_blank">{{ $shop->website }}</a></span>
					</p>
				</div>
			</div>
		</div>
	</div>
	@endforeach

	@foreach($shops_other as $shop)
	<div class="shops__card flex justify-start">
		<div class="shops__card__img-container">
			<img src="{{ asset('images/pictures/shops/'.$shop->picture) }}">
		</div>
		<div class="shops__card__txt-container">
			<div class="flex justify-between">
				<h3 class="shops__card__title">{{ $shop->name }}</h3>
				<p>
					<a href="{{ route('model-'.app()->getLocale()) }}" class="btn-couture-plain">Voir tous les articles</a>
				</p>
			</div>
			<p class="shops__card__desc">
				{{ $shop->$desc_query }}
			</p>
			<div class="text-left shops__card__highlight">
				<p class="mb-2">
					<strong>Adresse&nbsp;:</strong> {{ $shop->address }}
				</p>
				<div class="flex justify-start">
					<p class="w-1/2">
						<strong>Téléphone&nbsp;:</strong> {{ $shop->phone }}
					</p>
					<p>
						<strong>Site&nbsp;:</strong> <span class="primary-color"><a href="https://{{ $shop->website }}" class="shops__card__link" target="_blank">{{ $shop->website }}</a></span>
					</p>
				</div>
			</div>
		</div>
	</div>
	@endforeach

</section>