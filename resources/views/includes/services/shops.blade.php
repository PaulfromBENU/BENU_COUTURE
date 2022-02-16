<section class="w-3/4 m-auto text-center shops service-panel benu-container" id="services-shops">
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
					<a href="{{ route('model-'.app()->getLocale(), ['shops' => $shop->filter_key]) }}" class="btn-couture-plain">Voir tous les articles</a>
				</p>
			</div>
			<p class="shops__card__desc">
				{{ $shop->$desc_query }}
			</p>
			<div class="flex justify-start mb-5 shops__card__desc">
				<p class="mr-4"><strong>Horaires&nbsp;:</strong></p>
				<div class="text-left">
					<p>
						Lundi&nbsp;: @if($shop->opening_monday == 'closed') Fermé @else {{ $shop->opening_monday }} @endif
					</p>
					<p>
						Mardi&nbsp;: @if($shop->opening_tuesday == 'closed') Fermé @else {{ $shop->opening_tuesday }} @endif
					</p>
					<p>
						Mercredi&nbsp;: @if($shop->opening_wednesday == 'closed') Fermé @else {{ $shop->opening_wednesday }} @endif
					</p>
					<p>
						Jeudi&nbsp;: @if($shop->opening_thursday == 'closed') Fermé @else {{ $shop->opening_thursday }} @endif
					</p>
					<p>
						Vendredi&nbsp;: @if($shop->opening_friday == 'closed') Fermé @else {{ $shop->opening_friday }} @endif
					</p>
					<p>
						Samedi&nbsp;: @if($shop->opening_saturday == 'closed') Fermé @else {{ $shop->opening_saturday }} @endif
					</p>
					<p>
						Dimanche&nbsp;: @if($shop->opening_sunday == 'closed') Fermé @else {{ $shop->opening_sunday }} @endif
					</p>
				</div>
			</div>
			<div class="text-left shops__card__highlight">
				<div class="flex justify-start flex-wrap">
					<p class="mb-2 w-2/3">
						<strong>Adresse&nbsp;:</strong> {{ $shop->address }}
					</p>
					<p class="mb-2 w-1/3">
						<strong>E-mail&nbsp;:</strong> {{ $shop->email }}
					</p>
				</div>
				<div class="flex justify-start">
					<p class="w-2/3">
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
					<a href="{{ route('model-'.app()->getLocale(), ['shops' => $shop->filter_key]) }}" class="btn-couture-plain">Voir tous les articles</a>
				</p>
			</div>
			<p class="shops__card__desc">
				{{ $shop->$desc_query }}
			</p>
			<div class="flex justify-start mb-5 shops__card__desc">
				<p class="mr-4"><strong>Horaires&nbsp;:</strong></p>
				<div class="text-left">
					<p>
						Lundi&nbsp;: @if($shop->opening_monday == 'closed') Fermé @else {{ $shop->opening_monday }} @endif
					</p>
					<p>
						Mardi&nbsp;: @if($shop->opening_tuesday == 'closed') Fermé @else {{ $shop->opening_tuesday }} @endif
					</p>
					<p>
						Mercredi&nbsp;: @if($shop->opening_wednesday == 'closed') Fermé @else {{ $shop->opening_wednesday }} @endif
					</p>
					<p>
						Jeudi&nbsp;: @if($shop->opening_thursday == 'closed') Fermé @else {{ $shop->opening_thursday }} @endif
					</p>
					<p>
						Vendredi&nbsp;: @if($shop->opening_friday == 'closed') Fermé @else {{ $shop->opening_friday }} @endif
					</p>
					<p>
						Samedi&nbsp;: @if($shop->opening_saturday == 'closed') Fermé @else {{ $shop->opening_saturday }} @endif
					</p>
					<p>
						Dimanche&nbsp;: @if($shop->opening_sunday == 'closed') Fermé @else {{ $shop->opening_sunday }} @endif
					</p>
				</div>
			</div>
			<div class="text-left shops__card__highlight">
				<div class="flex justify-start flex-wrap">
					<p class="mb-2 w-2/3">
						<strong>Adresse&nbsp;:</strong> {{ $shop->address }}
					</p>
					<p class="mb-2 w-1/3">
						<strong>E-mail&nbsp;:</strong> {{ $shop->email }}
					</p>
				</div>
				<div class="flex justify-start">
					<p class="w-2/3">
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