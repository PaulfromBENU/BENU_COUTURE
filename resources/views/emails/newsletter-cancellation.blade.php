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

    <title>Newsletter BENU - confirmation d'annulation</title>
</head>
<body style="width: 80%; margin-left: 10%; font-family: 'Barlow';">
    <div style="width: 100%; margin-bottom: 50px; text-align: center;">
        <img src="{{ $message->embed(asset('images/pictures/logo_benu_green.png')) }}" style="height: 180px; margin: auto;" />
    </div>
    <div>
        <p>
            <strong>{{ __('emails.newsletter-cancellation-hello') }} {{ ucfirst($user->first_name) }},</strong>
        </p>
        <p>
            {{ __('emails.newsletter-cancellation-txt-1') }}
        </p>
        <p>
            {{ __('emails.newsletter-cancellation-info-1') }}
        </p>

        <p>
            {{ __('emails.newsletter-cancellation-conclusion') }}
        </p>
        <p>
            {{ __('emails.newsletter-cancellation-regards') }}
        </p>
        <p>
            <em><strong>{{ __('emails.newsletter-cancellation-your-team') }} BENU</strong></em>
        </p>
    </div>
</body>
</html>