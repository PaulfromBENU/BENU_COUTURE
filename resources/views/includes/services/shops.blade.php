<section class="w-3/4 m-auto text-center shops service-panel benu-container" id="services-shops">
	<h2 class="shops__title">{{ __('services.shops-title') }}</h2>

	@foreach($shops_benu as $shop)
	<div class="shops__card flex justify-start">
		<div class="shops__card__img-container">
			<img src="{{ asset('images/pictures/shops/'.$shop->picture) }}">
		</div>
		<div class="shops__card__txt-container">
			<div class="flex justify-between">
				<h3 class="shops__card__title">{{ $shop->name }}</h3>
				<p>
					<a href="{{ route('model-'.app()->getLocale(), ['shops' => $shop->filter_key]) }}" class="btn-couture-plain">{{ __('services.shops-articles-link') }}</a>
				</p>
			</div>
			<p class="shops__card__desc">
				{!! $shop->$desc_query !!}
			</p>
			<div class="flex justify-start mb-5 shops__card__desc">
				<p class="mr-4"><strong>{!! __('services.shops-opening') !!}:</strong></p>
				<div class="text-left">
					<p>
						{!! __('services.shops-monday') !!}: @if($shop->opening_monday == 'closed') {{ __('services.shops-closed') }} @else {{ $shop->opening_monday }} @endif
					</p>
					<p>
						{!! __('services.shops-tuesday') !!}: @if($shop->opening_tuesday == 'closed') {{ __('services.shops-closed') }} @else {{ $shop->opening_tuesday }} @endif
					</p>
					<p>
						{!! __('services.shops-wednesday') !!}: @if($shop->opening_wednesday == 'closed') {{ __('services.shops-closed') }} @else {{ $shop->opening_wednesday }} @endif
					</p>
					<p>
						{!! __('services.shops-thursday') !!}: @if($shop->opening_thursday == 'closed') {{ __('services.shops-closed') }} @else {{ $shop->opening_thursday }} @endif
					</p>
					<p>
						{!! __('services.shops-friday') !!}: @if($shop->opening_friday == 'closed') {{ __('services.shops-closed') }} @else {{ $shop->opening_friday }} @endif
					</p>
					<p>
						{!! __('services.shops-saturday') !!}: @if($shop->opening_saturday == 'closed') {{ __('services.shops-closed') }} @else {{ $shop->opening_saturday }} @endif
					</p>
					<p>
						{!! __('services.shops-sunday') !!}: @if($shop->opening_sunday == 'closed') {{ __('services.shops-closed') }} @else {{ $shop->opening_sunday }} @endif
					</p>
				</div>
			</div>
			<div class="text-left shops__card__highlight">
				<div class="flex justify-start flex-wrap">
					<p class="mb-2 w-7/12">
						<strong>{!! __('services.shops-address') !!}:</strong> <span class="font-medium">{{ $shop->address }}</span>
					</p>
					<p class="w-5/12">
						<strong>{!! __('services.shops-phone') !!}:</strong> <span class="font-medium">{{ $shop->phone }}</span>
					</p>
				</div>
				<div class="flex justify-start">
					<p class="mb-2 w-7/12">
						<strong>{!! __('services.shops-email') !!}:</strong> <a href="mailto:{{ $shop->email }}" class="primary-color shops__card__link">{{ $shop->email }}</a>
					</p>
					<p class="w-5/12">
						<strong>{!! __('services.shops-website') !!}:</strong> <span class="primary-color shops__card__link"><a href="https://{{ $shop->website }}" target="_blank">{{ $shop->website }}</a></span>
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
					<a href="{{ route('model-'.app()->getLocale(), ['shops' => $shop->filter_key]) }}" class="btn-couture-plain">{{ __('services.shops-articles-link') }}</a>
				</p>
			</div>
			<p class="shops__card__desc">
				{{ $shop->$desc_query }}
			</p>
			<div class="flex justify-start mb-5 shops__card__desc">
				<p class="mr-4"><strong>{!! __('services.shops-opening') !!}:</strong></p>
				<div class="text-left">
					<p>
						{!! __('services.shops-monday') !!}: @if($shop->opening_monday == 'closed') {{ __('services.shops-closed') }} @else {{ $shop->opening_monday }} @endif
					</p>
					<p>
						{!! __('services.shops-tuesday') !!}: @if($shop->opening_tuesday == 'closed') {{ __('services.shops-closed') }} @else {{ $shop->opening_tuesday }} @endif
					</p>
					<p>
						{!! __('services.shops-wednesday') !!}: @if($shop->opening_wednesday == 'closed') {{ __('services.shops-closed') }} @else {{ $shop->opening_wednesday }} @endif
					</p>
					<p>
						{!! __('services.shops-thursday') !!}: @if($shop->opening_thursday == 'closed') {{ __('services.shops-closed') }} @else {{ $shop->opening_thursday }} @endif
					</p>
					<p>
						{!! __('services.shops-friday') !!}: @if($shop->opening_friday == 'closed') {{ __('services.shops-closed') }} @else {{ $shop->opening_friday }} @endif
					</p>
					<p>
						{!! __('services.shops-saturday') !!}: @if($shop->opening_saturday == 'closed') {{ __('services.shops-closed') }} @else {{ $shop->opening_saturday }} @endif
					</p>
					<p>
						{!! __('services.shops-sunday') !!}: @if($shop->opening_sunday == 'closed') {{ __('services.shops-closed') }} @else {{ $shop->opening_sunday }} @endif
					</p>
				</div>
			</div>
			<div class="text-left shops__card__highlight">
				<div class="flex justify-start flex-wrap">
					<p class="mb-2 w-7/12">
						<strong>{!! __('services.shops-address') !!}:</strong> <span class="font-medium">{{ $shop->address }}</span>
					</p>
					<p class="w-5/12">
						<strong>{!! __('services.shops-phone') !!}:</strong> <span class="font-medium">{{ $shop->phone }}</span>
					</p>
				</div>
				<div class="flex justify-start">
					<p class="mb-2 w-7/12">
						<strong>{!! __('services.shops-email') !!}:</strong> <a href="mailto:{{ $shop->email }}" class="primary-color shops__card__link">{{ $shop->email }}</a>
					</p>
					<p class="w-5/12">
						<strong>{!! __('services.shops-website') !!}:</strong> <a href="https://{{ $shop->website }}" class="shops__card__link primary-color" target="_blank">{{ $shop->website }}</a>
					</p>
				</div>
			</div>
		</div>
	</div>
	@endforeach

</section>