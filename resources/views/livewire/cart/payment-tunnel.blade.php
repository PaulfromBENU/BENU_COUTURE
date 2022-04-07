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
                                <div class="payment-tunnel__delivery__address">
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

                                <div>
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
                            <div class="flex justify-between">
                                <div>
                                    <button class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover">
                                        Valider l'adresse de livraison
                                    </button>
                                </div>
                            </div>
                            @else
                            <p>Choisir parmi les addresses existantes ou creer une nouvelle adresse</p>
                            @endif
                        @else
                        <div class="text-center mt-10">
                            <button class="btn-couture" wire:click="addAddress">
                                + Ajouter une adresse
                            </button>
                        </div>
                        @endif
                    @else
                        @if($order_address_id == 0)
                        <div class="text-center mt-10">
                            <button class="btn-couture" wire:click="addAddress">
                                + Ajouter une adresse
                            </button>
                        </div>
                        @else
                        <p>Adresse ajoutée par l'invité</p>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
        @if($address_valid)
        <div class="payment-tunnel__block__content" @if($step == 2) style="display:none;" @endif>
            <div class="payment-tunnel__delivery__summary">
                Adresse de livraison&nbsp;: Nom de l'adresse
            </div>
        </div>
        @endif
    </div>


    <div class="payment-tunnel__payment payment-tunnel__block">
        <h2 class="payment-tunnel__block__title @if($step == 3) payment-tunnel__block__title--current @else payment-tunnel__block__title--waiting @endif" wire:click="changeStep(3)">
            3. Paiement
        </h2>
        <div class="payment-tunnel__block__content" style="display: none;">
            <div class="payment-tunnel__payment__field">
                Paiement à développer ici
            </div>
        </div>
    </div>
</section>