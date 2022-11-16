@extends('layouts.emails_layout')

@section('email-title')
	Nouvelle commande sur BENU
@endsection

@section('email-content')
	<p>
		<strong>Moien,</strong>
	</p>
	<p>
		Une nouvelle commande a été effectuée sur les sites BENU.
	</p>
	<p>
		Numéro de commande : <strong>{{ $order->unique_id }}</strong>
	</p>
	<p>
		Prix total de la commande : <strong>{{ $order->total_price }}&euro;</strong>
	</p>
	<p>
		Adresse de livraison : @if($order->address_id == 0) Retrait en magasin @endif
	</p>
	@if($order->address_id > 0)
	<ul>
		<li><strong>{{ $order->address->address_name }}</strong></li>
		<li>{{ $order->address->street_number }}, {{ $order->address->street }}</li>
		<li>{{ $order->address->zip_code }} {{ $order->address->city }}</li>
		<li>{{ $order->address->country }}</li>
		<li>{{ $order->address->phone }}</li>
	</ul>
	@endif
	<p>
		Pour suivre l'état de la commande, rejoindre l'onglet 'Handle Orders' dans le <a href="{{ route('home').'/benu-admin/handle-orders' }}" style="color: #D41C1B;">back-office</a>
	</p>
	<p>
		<em><strong>BENU Web</strong></em>
	</p>
@endsection