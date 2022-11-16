@extends('layouts.emails_layout')

@section('email-title')
    Newsletter BENU - nouvelle désinscription
@endsection

@section('email-content')
    <p>
        <strong>Moien,</strong>
    </p>
    <p>
        Un utilisateur souhaite annuler son inscription à la newsletter BENU. Il s'agit de l'utilisateur suivant :
    </p>
    <ul>
        <li>Prénom et Nom : {{ ucfirst($user->first_name) }} {{ ucfirst($user->last_name) }}</li>
        <li>Email : {{ $user->email }}</li>
        <li>Langue utilisateur : {{ strtoupper($locale) }}</li>
    </ul>
    <p>
        Merci de mettre cette information à jour dans la base de données MailChimp ! :)
    </p>
@endsection