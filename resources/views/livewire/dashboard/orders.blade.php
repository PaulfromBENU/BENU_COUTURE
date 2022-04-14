<div class="dashboard-orders w-full">
    <h2>
        {!! __('dashboard.my-orders') !!}
    </h2>

    @if($show_details == '0')
        @foreach($orders as $order)
            <div class="dashboard-orders__order flex justify-between" wire:key="{{ $order->id }}">
                <div class="w-2/3 pr-5">
                    <div class="flex justify-start mb-5">
                        <p class="mr-5">
                            No de commande&nbsp;: <strong>{{ $order->unique_id }}</strong>
                        </p>
                        <p>
                            Montant&nbsp;: <strong>{{ $order->total_price }}&euro;</strong>
                        </p>
                    </div>
                    <div class="dashboard-orders__order__details">
                        <p class="primary-color font-bold mb-5">
                            @if($order->status == '2')
                                @if($order->payment_status <= '1')
                                En attente de paiement
                                @else
                                Payée - 
                                    @if($order->delivery_status <= '1')
                                    Livraison en cours de préparation
                                    @else
                                    Expédiée le {{ date('d\/m\/Y', strtotime($order->delivery_date)) }}
                                        @if($order->delivery_link !== null) - <a href="{{ $order->delivery_link }}" class="primary-color hover:underline" target="_blank">Suivre ma commande</a>@endif
                                    @endif
                                @endif
                            @else
                                Commande non finalisée et non payée
                            @endif
                        </p>
                        <p>
                            <strong>{{ $order->cart->couture_variations->count() }} {{ trans_choice('dashboard.order-articles', $order->cart->couture_variations->count()) }}</strong>
                        </p>
                        <p>
                            Commande du <strong>{{ $order->created_at->format('d\/m\/Y') }}</strong>
                        </p>
                    </div>
                </div>

                <div class="w-1/3">
                    <div class="mb-5 text-right">
                        <button class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover w-4/5" style="padding-top: 1px; padding-bottom: 1px;" wire:click="showDetails({{ $order->id }})">
                            Détails de ma commande
                        </button>
                    </div>
                    <div class="mb-5 text-right">
                        <button class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover w-4/5" style="padding-top: 1px; padding-bottom: 1px;">
                            Facture
                        </button>
                    </div>
                    <div class="text-right">
                        <a href="{{ route('client-service-'.app()->getLocale()) }}" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover inline-block w-4/5" style="padding-top: 1px; padding-bottom: 1px;">
                            Service client
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
    <p>Ici les détails de la commande No {{ $order->unique_id }}</p>
    <div class="text-center mt-10">
        <button class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover" wire:click="hideDetails">
            Revenir à toutes les commandes
        </button>
    </div>
    @endif
</div>
