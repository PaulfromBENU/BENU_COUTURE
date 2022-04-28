<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet"> 

	<title>Bienvenue sur BENU</title>
</head>
<body style="width: 80%; margin-left: 10%; font-family: 'Barlow';">
	<div style="width: 100%; margin-bottom: 50px; text-align: center;">
		<img src="{{ $message->embed(asset('images/pictures/logo_benu_couture.png')) }}" style="height: 180px; margin: auto;" />
	</div>
	<div>
		<p>
			<strong>Bonjour,</strong>
		</p>
		<p>
			Merci pour votre achat sur notre plate-forme ! Nous allons maintenant préparer votre commande pour que vous puissiez en profiter au plus vite.
		</p>
		@if($order->payment_type == 3)
		<p>
			Avant de préparer ta commande, nous aurons besoin que tu effectues le paiement par virement bancaire dans les 5 prochains jours.
		</p>
		<p>
			Nos coordonnées bancaires sont les suivantes :
		</p>
		<p style="text-align: center; margin: 20px; font-weight: 600;">
			Données bancaires à inclure ici
		</p>
		<p>
			Merci de mentionner la référence suivante lors de ton virement, pour que nous puissions l'identifier facilement :
		</p>
		<p style="text-align: center; margin: 20px; font-weight: 600;">
			BENU{{ $order->unique_id }}
		</p>
		@endif
		<p>
			Numéro de commande : <strong>{{ $order->unique_id }}</strong>
		</p>
		<p>
			Prix total de votre commande : <strong>{{ $order->total_price }}&euro;</strong>
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
			Si une de ces données n'est pas correcte, n'hésitez pas à <a href="{{ route('client-service-'.$locale, ['page' => __('slugs.services-contact')]) }}">nous contacter</a> en n'oubliant pas de mentionner votre numéro de commande ci-dessus.
		</p>

		<p>
			À bientôt sur nos plates-formes ou dans notre magasin !
		</p>
		<p>
			<em><strong>L'équipe BENU</strong></em>
		</p>
	</div>
</body>
</html>