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

	<title>Votre bon d'achat BENU</title>
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
			Nous te remercions pour ta commande. Tu trouveras en pièce jointe de cet e-mail le bon d'achat que tu as acheté, au format pdf. 
		</p>
		<p>
			Ce bon d'achat a une valeur de <strong>{{ $voucher->initial_value }}&euro;</strong>
		</p>
		<p>
			Le bon d'achat n'est pas nominatif, et peut être utilisé soit en magasin, soit en ligne, avec le code <strong>{{ $voucher->unique_code }}</strong>
		</p>
		
		<p>
			Pour toute question, n'hésite pas à <a href="{{ route('client-service-'.$locale, ['page' => __('slugs.services-contact')]) }}">nous contacter</a>.
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