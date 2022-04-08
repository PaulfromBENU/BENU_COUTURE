<section class="payment-tunnel">
    <div class="payment-tunnel__identification payment-tunnel__block">
        <h2 class="payment-tunnel__block__title @if($step == 1) payment-tunnel__block__title--current @else payment-tunnel__block__title--finished @endif" wire:click="changeStep(1)">
            1. Identification
        </h2>
        <div class="payment-tunnel__block__content" @if($step > 1) style="display: none;" @endif>
            @guest
                @if($fill_info)
                    @livewire('cart.payment-tunnel-info-form')
                @else
                    <div class="payment-tunnel__identification__field mb-7">
                        <h4>Commande avec un compte BENU</h4>
                        <p>
                            Connecte-toi ou crée un compte pour centraliser tous tes achats BENU, et pour rester au courant de toutes nos nouveautés et offres.
                        </p>
                        <div class="payment-tunnel__identification__field__btn-container flex flex-col justify-center">
                            <a href="{{ route('login-'.app()->getLocale()) }}" class="btn-couture">
                                Se connecter
                            </a>
                        </div>
                    </div>
                    <div class="payment-tunnel__identification__field">
                        <h4>Commande en tant qu'invité</h4>
                        <p>
                            Tu ne possèdes pas de compte ? Tu peux commander en tant qu’invité ou en créer un pendant ta commande.
                        </p>
                        <div class="payment-tunnel__identification__field__btn-container flex flex-col justify-center">
                            <button class="btn-couture" wire:click="addInfo">
                                Choisir
                            </button>
                        </div>
                    </div>
                @endif
            @endguest
        </div>
        <div class="payment-tunnel__block__content" @if($step == 1) style="display:none;" @endif>
            @auth
                <div class="payment-tunnel__identification__logged">
                    Tu commandes en tant que {{ ucfirst(auth()->user()->first_name) }} {{ ucfirst(auth()->user()->last_name) }} ({{ auth()->user()->email }})
                </div>
            @else
                <div class="payment-tunnel__identification__logged relative">
                    Tu commandes en tant que {{ ucfirst($order_first_name) }} {{ ucfirst($order_last_name) }} ({{ $order_email }})
                    <div class="payment-tunnel__identification__modify flex flex-col justify-center">
                        <button class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover" wire:click="changeStep(1)">Modifier</button>
                    </div>
                </div>
            @endauth
        </div>
    </div>


    <div class="payment-tunnel__delivery payment-tunnel__block">
        <h2 class="payment-tunnel__block__title  @if($step == 2) payment-tunnel__block__title--current @elseif($step == 1) payment-tunnel__block__title--waiting @else payment-tunnel__block__title--finished @endif" wire:click="changeStep(2)">
            2. Livraison
        </h2>
        <div class="payment-tunnel__block__content" @if($step !== 2) style="display: none;" @endif>
            <div class="payment-tunnel__delivery__field">
                <h4>Informations de livraison</h4>
                @if($fill_address)
                    @livewire('cart.payment-tunnel-address-form')
                @else
                    @auth
                        @if(auth()->user()->addresses()->count() >= 1)
                            @if($address_chosen)
                            <p>
                                Je souhaite faire livrer cette commande à l'adresse suivante&nbsp;:
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
                                            Instructions supplémentaires&nbsp;: {{ $delivery_address->other_infos }}
                                        </p>
                                    @endif
                                </div>

                                <div class="w-1/3">
                                    <div>
                                        <button class="btn-couture mb-5" wire:click="changeAddress">
                                            Choisir une autre adresse
                                        </button>
                                    </div>
                                    <div>
                                        <a href="{{ route('dashboard', ['locale' => app()->getLocale(), 'section' => 'addresses']) }}" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover">
                                            Modifier cette adresse
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
                                    + Ajouter une adresse
                                </button>
                            </div>
                            @endif
                        @else
                        <div class="text-center mt-10">
                            <button class="btn-couture" wire:click="addAddress">
                                + Ajouter une adresse
                            </button>
                        </div>
                        @endif
                    @else
                        @if($address_chosen == 0)
                        <div class="text-center mt-10">
                            <button class="btn-couture" wire:click="addAddress">
                                + Ajouter une adresse
                            </button>
                        </div>
                        @else
                        <p>
                            Je souhaite faire livrer cette commande à l'adresse suivante&nbsp;:
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
                                        Instructions supplémentaires&nbsp;: {{ $delivery_address->other_infos }}
                                    </p>
                                @endif
                            </div>

                            <div class="w-1/3">
                                <div>
                                    <button class="btn-couture mb-5" wire:click="changeAddress">
                                        Choisir une autre adresse
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
                                Valider l'adresse de livraison
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
                Adresse de livraison&nbsp;: {{ $address_name }}
            </div>
        </div>
        @endif
    </div>


    <div class="payment-tunnel__payment payment-tunnel__block">
        <h2 class="payment-tunnel__block__title @if($step == 3) payment-tunnel__block__title--current @else payment-tunnel__block__title--waiting @endif" wire:click="changeStep(3)">
            3. Paiement
        </h2>
        <div class="payment-tunnel__block__content" @if($step !== 3 || !$info_valid || !$address_valid) style="display:none;" @endif>
            <div class="payment-tunnel__payment__field flex flex-col justify-center mb-7">
                <div class="grid grid-cols-8">
                    <div class="col-span-2">
                        <p style="padding-top: 7px;">
                            Paiement par carte bancaire
                        </p>
                    </div>
                    <div class="col-span-1"></div>
                    <div class="col-span-2">
                        <img src="{{ asset('images/pictures/services_payment_cards.png') }}" alt="Payment with Visa, Mastercard, AmEx" class="m-auto" />
                    </div>
                    <div class="col-span-1"></div>
                    <div class="col-span-2 text-right pt-1">
                        <button class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover" wire:click="validateOrder('card')">Je confirme</button>
                    </div>
                </div>
            </div>

            <div class="payment-tunnel__payment__field flex flex-col justify-center mb-7">
                <div class="grid grid-cols-8">
                    <div class="col-span-2">
                        <p style="padding-top: 7px;">
                            Paiement par PayPal
                        </p>
                    </div>
                    <div class="col-span-1"></div>
                    <div class="col-span-2">
                        <img src="{{ asset('images/pictures/services_payment_paypal.png') }}" alt="Payment with Paypal" class="m-auto" />
                    </div>
                    <div class="col-span-1"></div>
                    <div class="col-span-2 text-right pt-1">
                        <button class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover" wire:click="validateOrder('paypal')">Je confirme</button>
                    </div>
                </div>
            </div>

            <div class="payment-tunnel__payment__field flex flex-col justify-center mb-7">
                <div class="grid grid-cols-8">
                    <div class="col-span-2">
                        <p style="padding-top: 7px;">
                            Paiement par Digicash
                        </p>
                    </div>
                    <div class="col-span-1"></div>
                    <div class="col-span-2">
                        <img src="{{ asset('images/pictures/services_payment_digicash.png') }}" alt="Payment with Digicash" class="m-auto" />
                    </div>
                    <div class="col-span-1"></div>
                    <div class="col-span-2 text-right pt-1">
                        <button class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover" wire:click="validateOrder('digicash')">Je confirme</button>
                    </div>
                </div>
            </div>

            <div class="payment-tunnel__payment__field flex flex-col justify-center">
                <div class="grid grid-cols-8">
                    <div class="col-span-2">
                        <p style="padding-top: 7px;">
                            Paiement par virement bancaire
                        </p>
                    </div>
                    <div class="col-span-1"></div>
                    <div class="col-span-2">
                        <img src="{{ asset('images/pictures/services_payment_transfer.png') }}" alt="Payment with bank transfer" class="m-auto" />
                    </div>
                    <div class="col-span-1"></div>
                    <div class="col-span-2 text-right pt-1">
                        <button class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover" wire:click="validateOrder('transfer')">Je confirme</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>