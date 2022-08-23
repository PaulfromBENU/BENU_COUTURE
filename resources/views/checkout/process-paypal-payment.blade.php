@extends('layouts.payment_layout')

@section('title')
	{{ __('payment.process-seo-title') }}
@endsection

@section('description')
	{{ __('payment.process-seo-description') }}
@endsection

@section('main-content')
<!-- https://developer.paypal.com/integration-builder -->
	<section class="w-2/3 m-auto text-center">
		<h1 class="text-3xl primary-color mb-5 font-bold">{{ __('payment.process-payment-by-paypal') }}</h1>
		<div class="mb-5">
			<img src="{{ asset('images/pictures/services_payment_paypal.png') }}" style="height: 50px;" class="m-auto" />
		</div>
		<h3 class="text-lg mb-5">{{ __('payment.process-total-price') }}&nbsp;: <span class="primary-color font-bold">{{ $order->total_price }}&euro;</span></h3>

		<div class="mb-10">
			<p>
				{{ __('payment.process-number-of-articles') }}&nbsp;: <span class="primary-color font-bold"> {{ $order->cart->couture_variations()->count() }}</span>
			</p>
			<p>
				{{ __('payment.process-user-details') }}&nbsp;: <span class="primary-color font-bold"> {{ $order->user->first_name }} {{ $order->user->last_name }}</span>
			</p>
		</div>

		<script src="https://www.paypal.com/sdk/js?client-id=test&currency=EUR&disable-funding=card"></script>

		<div id="paypal-button-container"></div>
	</section>
@endsection

@section('scripts')
<script>
	paypal.Buttons({

	// Sets up the transaction when a payment button is clicked
	createOrder: (data, actions) => {

		return actions.order.create({
			purchase_units: [{
				amount: {
					value: {{ $order->total_price }} // Can also reference a variable or function
				}
			}]
		});
	},

	// Finalize the transaction after payer approval

	onApprove: (data, actions) => {

		return actions.order.capture().then(function(orderData) {

			// For production
			// actions.redirect('{{ route('payment-processed-'.app()->getLocale(), ['order' => $order_id]) }}');

			// Successful capture! For dev/demo purposes:
			console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
			const transaction = orderData.purchase_units[0].payments.captures[0];
			alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);

			// When ready to go live, remove the alert and show a success message within this page. For example:
			// const element = document.getElementById('paypal-button-container');
			// element.innerHTML = '<h3>Thank you for your payment!</h3>';
			// Or go to another URL:  actions.redirect('thank_you.html');
		});
	}

}).render('#paypal-button-container');

</script>
@endsection