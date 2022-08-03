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

	<title>{{ __('emails.register-welcome-to-benu') }}</title>
</head>
<body style="width: 80%; margin-left: 10%; font-family: 'Barlow';">
	<div style="width: 100%; margin-bottom: 50px; text-align: center;">
		<img src="{{ $message->embed(asset('images/pictures/logo_benu_green.png')) }}" style="height: 180px; margin: auto;" />
	</div>
	<div>
		<p>
			<strong>{{ __('emails.register-hello') }} {{ ucfirst($user->first_name) }},</strong>
		</p>
		<p>
			{{ __('emails.register-txt-1') }}
		</p>
		<p style="text-align: center; color: #27955B;">
			<strong>{{ $user->email }}</strong>
		</p>
		<p>
			{{ __('emails.register-txt-2') }} <a href="{{ route('dashboard', ['locale' => $locale]) }}">{{ __('emails.register-dashboard') }}</a> {{ __('emails.register-txt-3') }}.
			{{ __('emails.register-txt-4') }} <a href="mailto:info@benucouture.lu">info@benucouture.lu</a> {{ __('emails.register-txt-5') }} <a href="{{ route('client-service-'.$locale, ['page' => __('slugs.services-contact')]) }}">{{ __('emails.register-contact') }}</a>.
		</p>
		<p>
			{{ __('emails.register-txt-6') }}
		</p>
		<p>
			<em><strong>{{ __('emails.register-benu-team-signature') }}</strong></em>
		</p>
	</div>
</body>
</html>