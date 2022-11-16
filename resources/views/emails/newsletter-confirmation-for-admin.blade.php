@extends('layouts.emails_layout')

@section('email-title')
    Newsletter BENU - nouvelle inscription
@endsection

@section('email-content')
    <p>
        <strong>Moien,</strong>
    </p>
    <p>
        Une nouvelle demande d'inscription à la newsletter a été envoyée depuis <span style="color: #D41C1B;">BENU COUTURE</span> ! Les coordonnées de la personne sont les suivantes :
    </p>
    <ul>
        <li>Prénom et Nom : {{ ucfirst($user->first_name) }} {{ ucfirst($user->last_name) }}</li>
        <li>Email : {{ $user->email }}</li>
        <li>Langue utilisateur : {{ strtoupper($locale) }}</li>
        <li>URL : {{ route('newsletter-'.$locale) }}</li>
        <li>Date et heure de connection : {{ Carbon\Carbon::now()->format('d\/m\/Y H:i:s') }}</li>
        <li>Adresse IP : {{ \Request::ip() }}</li>
    </ul>
    <p>
        Merci de mettre cette information à jour dans la base de données MailChimp ! :)
    </p>
@endsection