@extends('layouts.payment_layout')

@section('title')
	{{ __('payment.seo-title') }}
@endsection

@section('description')
	{{ __('payment.seo-description') }}
@endsection

@section('main-content')
	<div class="flex justify-between mt-10 pt-10 benu-container">
		<section class="payment-tunnel">
			<div class="payment-tunnel__identification payment-tunnel__block">
				<h2 class="payment-tunnel__block__title @guest payment-tunnel__block__title--current @else payment-tunnel__block__title--finished @endguest">
					1. Identification
				</h2>
				<div class="payment-tunnel__block__content">
					@auth
						<div class="payment-tunnel__identification__logged">
							Tu commandes en tant que {{ ucfirst(auth()->user()->first_name) }} {{ ucfirst(auth()->user()->last_name) }} ({{ auth()->user()->email }})
						</div>
					@else
						<div class="payment-tunnel__identification__field">
							Connexion ou inscription ou invité à développer ici
						</div>
					@endauth
				</div>
			</div>
			<div class="payment-tunnel__delivery payment-tunnel__block">
				<h2 class="payment-tunnel__block__title  @auth payment-tunnel__block__title--current @else payment-tunnel__block__title--finished @endauth">
					2. Livraison
				</h2>
				<div class="payment-tunnel__block__content" @guest style="display: none;" @endguest>
					<div class="payment-tunnel__delivery__field">
						Livraison à développer ici
					</div>
				</div>
			</div>
			<div class="payment-tunnel__payment payment-tunnel__block">
				<h2 class="payment-tunnel__block__title payment-tunnel__block__title--waiting">
					3. Paiement
				</h2>
				<div class="payment-tunnel__block__content" style="display: none;">
					<div class="payment-tunnel__payment__field">
						Paiement à développer ici
					</div>
				</div>
			</div>
		</section>

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