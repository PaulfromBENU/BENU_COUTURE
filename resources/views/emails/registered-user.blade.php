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
		<img src="{{ $message->embed(asset('images/favicon/android-icon-192x192.png')) }}" style="height: 180px; margin: auto;" />
	</div>
	<div>
		<p>
			<strong>Bonjour {{ $user->first_name }},</strong>
		</p>
		<p>
			Bienvenue sur BENU ! Nous confirmons ton inscription sur nos plates-formes. Ton compte est désormais disponible sur tous les sites web BENU (sauf BENU REUSE). Ton e-mail de connexion est le suivant :
		</p>
		<p style="text-align: center;">
			<strong>{{ $user->email }}</strong>
		</p>
		<p>
			Tu peux également suivre tes activités sur BENU depuis ton <a href="{{ route('dashboard', ['locale' => $locale]) }}">espace personnel</a>.
			Pour toute question, tu peux nous contacter grâce à notre <a href="{{ route('client-service-'.$locale, ['page' => __('slugs.services-contact')]) }}">formulaire de contact</a>.
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