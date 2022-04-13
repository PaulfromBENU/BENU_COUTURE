
@if($order->payment_type == '0')
<h1>Paiement de {{ $order->total_price }}&euro; par carte bien enregistré !</h1>
<p>
	En attente de la maquette pour la page de confirmation de paiement.
</p>
@elseif($order->payment_type == '1')
<h1>Paiement de {{ $order->total_price }}&euro; par Paypal bien enregistré !</h1>
<p>
	En attente de la maquette pour la page de confirmation de paiement.
</p>
@elseif($order->payment_type == '2')
<h1>Paiement de {{ $order->total_price }}&euro; par Payconiq bien enregistré !</h1>
<p>
	En attente de la maquette pour la page de confirmation de paiement.
</p>
@elseif($order->payment_type == '3')
<h1>Paiement de {{ $order->total_price }}&euro; par virement bancaire bien enregistré !</h1>
<p>
	En attente de la maquette pour la page de confirmation de paiement.
</p>
@else
<h1>Paiement de {{ $order->total_price }}&euro; bien enregistré !</h1>
<p>
	En attente de la maquette pour la page de confirmation de paiement.
</p>
@endif