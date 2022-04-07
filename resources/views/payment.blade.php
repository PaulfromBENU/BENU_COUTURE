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
					<p>
						@if($variation->name == 'voucher')
						{{ $variation->pivot->articles_number }}x {{ __('vouchers.card-name') }} {{ $variation->pivot->value }}&euro; @if($variation->voucher_value == 'pdf') PDF @else {{ __('vouchers.format-clothe') }} @endif
						@else
						{{ $variation->pivot->articles_number }}x {{ strtoupper($variation->name) }} Taille {{ $variation->size->value }}
						@endif
					</p>
					<p class="text-right text-gray-400 mb-3" style="border-bottom: solid 1px lightgrey;">
						@if($variation->name == 'voucher')
						<em>{{ $variation->pivot->articles_number *$variation->pivot->value }}&euro;</em>
						@else
						<em>{{ $variation->pivot->articles_number * $variation->creation->price }}&euro;</em>
						@endif
					</p>
					@endforeach
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