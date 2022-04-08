@extends('layouts.payment_layout')

@section('title')
	{{ __('payment.seo-title') }}
@endsection

@section('description')
	{{ __('payment.seo-description') }}
@endsection

@section('main-content')
	<div class="flex justify-between mt-10 pt-10 benu-container">
		@livewire('cart.payment-tunnel', ['cart_id' => $cart_id])

		<section class="payment-summary">
			<div class="mb-5">
				<div class="payment-summary__title flex justify-between" id="payment-cart-content-btn">
					<h3>
						Votre commande contient<br/><strong>{{ $cart->couture_variations->count() }} PRODUITS</strong>
					</h3>
					<div class="payment-summary__title__plus" id="payment-cart-plus">
						+
					</div>
					<div class="payment-summary__title__plus" id="payment-cart-minus" style="display: none;">
						-
					</div>
				</div>
				<div class="payment-summary__cart-content" id="payment-cart-content" style="display: none; height: 0px;">
					@foreach($cart->couture_variations as $variation)
					<div class="payment-summary__cart-content__article mb-7 flex justify-start">
						@if($variation->name == 'voucher')
							<img src="{{ asset('images/pictures/vouchers_img.png') }}" />
							<div>
								<p class="payment-summary__cart-content__article__name">
									BON D'ACHAT
								</p>
								<div class="payment-summary__cart-content__article__size">
									@if($variation->voucher_value == 'pdf') PDF @else {{ __('vouchers.format-clothe') }} @endif
								</div>
								<div class="flex">
									<p class="payment-summary__cart-content__article__info">
										Valeur unitaire : {{ $variation->pivot->value }}&euro;
									</p>
								</div>
								<p class="payment-summary__cart-content__article__info">
									Exemplaires : x{{ $variation->pivot->articles_number }}
								</p>
								<p class="payment-summary__cart-content__article__info">
									<strong>Prix total : {{ $variation->pivot->articles_number *$variation->pivot->value }}&euro;</strong>
								</p>
							</div>
						@else
							@if($variation->photos()->where('is_front', '1')->count() > 0)
								<img src="{{ asset('images/pictures/articles/'.$variation->photos()->where('is_front', '1')->first()->file_name) }}" />
							@else
								<img src="{{ asset('images/pictures/articles/'.$variation->photos()->first()->file_name) }}" />
							@endif
							<div>
								<p class="payment-summary__cart-content__article__name">
									{{ strtoupper($variation->name) }}
								</p>
								<div class="payment-summary__cart-content__article__size">
									TAILLE {{ $variation->size->value }}
								</div>
								<div class="flex">
									<p class="payment-summary__cart-content__article__info">Couleur : </p>
									<div class="color-circle ml-1 mt-2" style="background: {{ $variation->color->hex_code }};"></div>
									<p class="payment-summary__cart-content__article__info">
										{{ __('colors.'.$variation->color->name) }}
									</p>
								</div>
								<p class="payment-summary__cart-content__article__info">
									Exemplaires : x{{ $variation->pivot->articles_number }}
								</p>
								<p class="payment-summary__cart-content__article__info">
									<strong>Prix total : {{ $variation->pivot->articles_number * $variation->creation->price }}&euro;</strong>
								</p>
							</div>
						@endif
					</div>
					@endforeach
					<p class="text-right text-gray-400 mb-3" style="border-bottom: solid 1px lightgrey;"></p>
				</div>
			</div>

			<div>
				@livewire('cart.cart-summary', ['cart_id' => $cart_id])
			</div>

			<div class="cart-client-service flex justify-center flex-wrap mb-10">
				<div>
					@svg('svg_conseil_tel')
					<p>{{ __('cart.service-tel') }}</p>
				</div>
				<div>
					@svg('svg_garantie_vie')
					<p>{{ __('cart.service-warranty') }}</p>
				</div>
				<div>
					@svg('svg_pickup_store')
					<p>{{ __('cart.service-pickup') }}</p>
				</div>
				<div>
					@svg('svg_voucher')
					<p>{{ __('cart.service-voucher') }}</p>
				</div>
				<div>
					@svg('svg_kulturpass')
					<p>{{ __('cart.service-kulturpass') }}</p>
				</div>
			</div>
		</section>
	</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$(function() {
		$('#payment-cart-content-btn').on('click', function() {
			if ($('#payment-cart-content').css('display') == 'none') {
				$('#payment-cart-content').fadeIn();
				$('#payment-cart-content').css('height', 'fit-content');
				$('#payment-cart-plus').hide();
				$('#payment-cart-minus').show();
			} else {
				$('#payment-cart-content').fadeOut('fast', function() {
					$('#payment-cart-content').css('height', '0px');
				});
				$('#payment-cart-minus').hide();
				$('#payment-cart-plus').show();
			}
		});
	});
</script>
@endsection