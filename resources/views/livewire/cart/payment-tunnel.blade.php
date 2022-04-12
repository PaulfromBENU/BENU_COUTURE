<section class="payment-tunnel">
    <div class="payment-tunnel__identification payment-tunnel__block">
        <h2 class="payment-tunnel__block__title @if($step == 1) payment-tunnel__block__title--current @else payment-tunnel__block__title--finished @endif" wire:click="changeStep(1)">
            1. {{ __('cart.payment-id') }}
        </h2>
        <div class="payment-tunnel__block__content" @if($step > 1) style="display: none;" @endif>
            @guest
                @if($fill_info)
                    @livewire('cart.payment-tunnel-info-form')
                @else
                    <div class="payment-tunnel__identification__field mb-7">
                        <h4>{{ __('cart.payment-order-with-benu') }}</h4>
                        <p>
                            {{ __('cart.payment-connect-txt') }}
                        </p>
                        <div class="payment-tunnel__identification__field__btn-container flex flex-col justify-center">
                            <a href="{{ route('login-'.app()->getLocale()) }}" class="btn-couture">
                                {{ __('cart.payment-login') }}
                            </a>
                        </div>
                    </div>
                    <div class="payment-tunnel__identification__field">
                        <h4>{{ __('cart.payment-order-as-guest') }}</h4>
                        <p>
                            {{ __('cart.payment-order-as-guest-txt') }}
                        </p>
                        <div class="payment-tunnel__identification__field__btn-container flex flex-col justify-center">
                            <button class="btn-couture" wire:click="addInfo">
                                {{ __('cart.payment-info-choose') }}
                            </button>
                        </div>
                    </div>
                @endif
            @endguest
        </div>
        <div class="payment-tunnel__block__content" @if($step == 1) style="display:none;" @endif>
            @auth
                <div class="payment-tunnel__identification__logged">
                    {{ __('cart.payment-ordering-as') }} {{ ucfirst(auth()->user()->first_name) }} {{ ucfirst(auth()->user()->last_name) }} ({{ auth()->user()->email }})
                </div>
            @else
                <div class="payment-tunnel__identification__logged relative">
                    {{ __('cart.payment-ordering-as') }} {{ ucfirst($order_first_name) }} {{ ucfirst($order_last_name) }} ({{ $order_email }})
                    <div class="payment-tunnel__identification__modify flex flex-col justify-center">
                        <button class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover" wire:click="changeStep(1)">{{ __('cart.payment-ordering-as-modify') }}</button>
                    </div>
                </div>
            @endauth
        </div>
    </div>


    <div class="payment-tunnel__delivery payment-tunnel__block">
        <h2 class="payment-tunnel__block__title  @if($step == 2) payment-tunnel__block__title--current @elseif($step == 1) payment-tunnel__block__title--waiting @else payment-tunnel__block__title--finished @endif" wire:click="changeStep(2)">
            2. {{ __('cart.payment-delivery') }}
        </h2>
        <div class="payment-tunnel__block__content" @if($step !== 2) style="display: none;" @endif>
            <div class="payment-tunnel__delivery__field">
                <h4>{{ __('cart.payment-delivery-info') }}</h4>
                @if($fill_address)
                    @livewire('cart.payment-tunnel-address-form')
                @else
                    @auth
                        @if(auth()->user()->addresses()->count() >= 1)
                            @if($address_chosen)
                            <p>
                                {!! __('cart.payment-delivery-wish') !!}:
                            </p>
                            <div class="flex justify-between payment-tunnel__delivery__address-container">
                                <div class="payment-tunnel__delivery__address w-2/3">
                                    <div class="payment-tunnel__delivery__address__name">
                                        {{ $delivery_address->address_name }}
                                    </div>
                                    <h5>
                                        {{ $delivery_address->first_name }} {{ $delivery_address->last_name }}
                                    </h5>
                                    <p>
                                        {{ $delivery_address->street_number }}, {{ $delivery_address->street }}
                                    </p>
                                    @if(isset($delivery_address->floor))
                                        <p>
                                            {{ $delivery_address->floor }}
                                        </p>
                                    @endif
                                    <p>
                                        {{ $delivery_address->zip_code }} {{ $delivery_address->city }}
                                    </p>
                                    <p>
                                        {{ $delivery_address->phone }}
                                    </p>
                                    @if(isset($delivery_address->other_infos))
                                        <p>
                                            {{ __('cart.payment-delivery-more-info') }}&nbsp;: {{ $delivery_address->other_infos }}
                                        </p>
                                    @endif
                                </div>

                                <div class="w-1/3">
                                    <div>
                                        <button class="btn-couture mb-5" wire:click="changeAddress">
                                            {{ __('cart.payment-delivery-choose-other') }}
                                        </button>
                                    </div>
                                    <div>
                                        <a href="{{ route('dashboard', ['locale' => app()->getLocale(), 'section' => 'addresses']) }}" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover">
                                            {{ __('cart.payment-delivery-modify') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="flex justify-around flex-wrap mt-5 mb-10">
                                @foreach(auth()->user()->addresses as $address)
                                    <div class="text-center" wire:key="{{ $address->id }}">
                                        <button class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover" wire:click="selectAddress({{ $address->id }})">
                                            {{ $address->address_name }}
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-center mt-5">
                                <button class="btn-couture" wire:click="addAddress">
                                    + {{ __('cart.payment-delivery-add-new') }}
                                </button>
                            </div>
                            @endif
                        @else
                        <div class="text-center mt-10">
                            <button class="btn-couture" wire:click="addAddress">
                                + {{ __('cart.payment-delivery-add-new') }}
                            </button>
                        </div>
                        @endif
                    @else
                        @if($address_chosen == 0)
                        <div class="text-center mt-10">
                            <button class="btn-couture" wire:click="addAddress">
                                + {{ __('cart.payment-delivery-add-new') }}
                            </button>
                        </div>
                        @else
                        <p>
                            {!! __('cart.payment-delivery-wish') !!}:
                        </p>
                        <div class="flex justify-between payment-tunnel__delivery__address-container">
                            <div class="payment-tunnel__delivery__address w-2/3">
                                <div class="payment-tunnel__delivery__address__name">
                                    {{ $delivery_address->address_name }}
                                </div>
                                <h5>
                                    {{ $delivery_address->first_name }} {{ $delivery_address->last_name }}
                                </h5>
                                <p>
                                    {{ $delivery_address->street_number }}, {{ $delivery_address->street }}
                                </p>
                                @if(isset($delivery_address->floor))
                                    <p>
                                        {{ $delivery_address->floor }}
                                    </p>
                                @endif
                                <p>
                                    {{ $delivery_address->zip_code }} {{ $delivery_address->city }}
                                </p>
                                <p>
                                    {{ $delivery_address->phone }}
                                </p>
                                @if(isset($delivery_address->other_infos))
                                    <p>
                                        {{ __('cart.payment-delivery-more-info') }}&nbsp;: {{ $delivery_address->other_infos }}
                                    </p>
                                @endif
                            </div>

                            <div class="w-1/3">
                                <div>
                                    <button class="btn-couture mb-5" wire:click="changeAddress">
                                        {{ __('cart.payment-delivery-choose-other') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endauth
                    @if($address_chosen)
                    <div class="flex justify-between">
                        <div>
                            <button class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover" wire:click="validateDeliveryStep">
                                {{ __('cart.payment-delivery-validate') }}
                            </button>
                        </div>
                    </div>
                    @endif
                @endif
            </div>
        </div>
        @if($address_valid)
        <div class="payment-tunnel__block__content" @if($step == 2 || !$address_valid) style="display:none;" @endif>
            <div class="payment-tunnel__delivery__summary">
                {{ __('cart.payment-delivery-address-summary') }}&nbsp;: {{ $address_name }}
            </div>
        </div>
        @endif
    </div>


    <div class="payment-tunnel__payment payment-tunnel__block">
        <h2 class="payment-tunnel__block__title @if($step == 3) payment-tunnel__block__title--current @else payment-tunnel__block__title--waiting @endif" wire:click="changeStep(3)">
            3. {{ __('cart.payment-pay') }}
        </h2>
        <div class="payment-tunnel__block__content" @if($step !== 3 || !$info_valid || !$address_valid) style="display:none;" @endif>
            <div class="payment-tunnel__payment__field flex flex-col justify-center mb-7">
                <div class="grid grid-cols-8">
                    <div class="col-span-2">
                        <p style="padding-top: 7px;">
                            {{ __('cart.payment-pay-with-card') }}
                        </p>
                    </div>
                    <div class="col-span-1"></div>
                    <div class="col-span-2">
                        <img src="{{ asset('images/pictures/services_payment_cards.png') }}" alt="Payment with Visa, Mastercard, AmEx" class="m-auto" />
                    </div>
                    <div class="col-span-1"></div>
                    <div class="col-span-2 text-right pt-1">
                        <button class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover" wire:click="validateOrder('card')">{{ __('cart.payment-confirm') }}</button>
                    </div>
                </div>

                <div>
                    <!-- <form method="POST" wire:submit.prevent="validateOrder('card')">
                        <input id="card-holder-name" type="text"> -->
     
                        <!-- Stripe Elements Placeholder -->
                        <!-- <div id="card-element"></div> -->
                         
                        <!-- <button type="submit" id="card-button">
                            {{ __('cart.payment-process-payment') }}
                        </button> -->
                    </form>
                </div>
            </div>

            <div class="payment-tunnel__payment__field flex flex-col justify-center mb-7">
                <div class="grid grid-cols-8">
                    <div class="col-span-2">
                        <p style="padding-top: 7px;">
                            {{ __('cart.payment-pay-with-paypal') }}
                        </p>
                    </div>
                    <div class="col-span-1"></div>
                    <div class="col-span-2">
                        <img src="{{ asset('images/pictures/services_payment_paypal.png') }}" alt="Payment with Paypal" class="m-auto" />
                    </div>
                    <div class="col-span-1"></div>
                    <div class="col-span-2 text-right pt-1">
                        <button class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover" wire:click="validateOrder('paypal')">{{ __('cart.payment-confirm') }}</button>
                    </div>
                </div>
            </div>

            <div class="payment-tunnel__payment__field flex flex-col justify-center mb-7">
                <div class="grid grid-cols-8">
                    <div class="col-span-2">
                        <p style="padding-top: 7px;">
                            {{ __('cart.payment-pay-with-digicash') }}
                        </p>
                    </div>
                    <div class="col-span-1"></div>
                    <div class="col-span-2">
                        <img src="{{ asset('images/pictures/services_payment_digicash.png') }}" alt="Payment with Digicash" class="m-auto" />
                    </div>
                    <div class="col-span-1"></div>
                    <div class="col-span-2 text-right pt-1">
                        <button class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover" wire:click="validateOrder('digicash')">{{ __('cart.payment-confirm') }}</button>
                    </div>
                </div>
            </div>

            <div class="payment-tunnel__payment__field flex flex-col justify-center">
                <div class="grid grid-cols-8">
                    <div class="col-span-2">
                        <p style="padding-top: 7px;">
                            {{ __('cart.payment-pay-with-transfer') }}
                        </p>
                    </div>
                    <div class="col-span-1"></div>
                    <div class="col-span-2">
                        <img src="{{ asset('images/pictures/services_payment_transfer.png') }}" alt="Payment with bank transfer" class="m-auto" />
                    </div>
                    <div class="col-span-1"></div>
                    <div class="col-span-2 text-right pt-1">
                        <button class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover" wire:click="validateOrder('transfer')">{{ __('cart.payment-confirm') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>