<div class="cart-summary">
    <div class="flex justify-between cart-summary__price">
        <p>
            {{ __('cart.sub-total') }}
        </p>
        <p>
            {{ $articles_sum }}&euro;
        </p>
    </div>
    <div class="flex justify-between cart-summary__price">
        <p>
            {{ __('cart.delivery-estimate') }}
        </p>
        <p>
            @if($delivery_sum == 0)
            {{ strtoupper(__('cart.delivery-free')) }}
            @else
            {{ $delivery_sum }}&euro;
            @endif
        </p>
    </div>
    <div class="flex justify-between cart-summary__price">
        <p>
            <strong>{{ __('cart.total-estimate') }}</strong>
        </p>
        <p>
            <strong>{{ $total }}&euro;</strong>
        </p>
    </div>

    <div class="flex cart-summary__use-voucher">
        <input type="checkbox" name="cart_use_voucher" id="cart-use-voucher">
        <label for="cart-use-voucher">{{ __('cart.use-voucher') }}</label>
    </div>

    @if(Route::currentRouteName() !== 'payment-'.app()->getLocale() && $total > 0)
    <div>
        <a href="{{ route('payment-'.app()->getLocale()) }}" class="block btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover w-full" style="margin: 0;">
            {{ __('cart.make-order') }}
        </a>
    </div>
    @endif

    <div class="cart-summary__payment-options">
        <h4 class="text-center">{{ __('cart.payment-options') }}</h4>
        <div class="flex justify-center flex-wrap">
            <img src="{{ asset('images/pictures/services_payment_cards.png') }}" alt="Payment with Visa, Mastercard, AmEx" />
            <img src="{{ asset('images/pictures/services_payment_digicash.png') }}" alt="Payment with Digicash" />
            <img src="{{ asset('images/pictures/services_payment_paypal.png') }}" alt="Payment with PayPal" />
            <img src="{{ asset('images/pictures/services_payment_transfer.png') }}" alt="Payment with Bank Transfer" />
        </div>
    </div>
</div>