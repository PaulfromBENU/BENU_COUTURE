@extends('layouts.base_layout')

@section('title')
	Contactez BENU COUTURE
@endsection

@section('description')
	Une question, une information manquante, une remarque ? Contactez BENU COUTURE par téléphone, par e-mail ou directement via notre formulaire de contact.
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="benu-container breadcrumbs__content flex justify-start">
			<a href="{{ route('home') }}">Accueil</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('contact') }}" class="primary-color"><strong>Contact</strong></a>
		</div>
	</div>
@endsection

@section('main-content')
	<section class="w-1/2 m-auto text-center contact">
		<div class="contact__subtitle">
			Nous contacter
		</div>
		<div class="contact__title">
			<h1>
				Je contacte BENU COUTURE
			</h1>
		</div>
		<div class="contact__mail">
			<a href="mailto:info@benucouture.lu" class="btn-slider-left m-auto">info@benucouture.lu</a>
		</div>
		<div class="contact__phone">
			+352 123 456 789
		</div>
		<div class="contact__opening">
			Ouvert du lundi au samedi, de 9h à 18h
		</div>
		<div class="contact__moreinfo">
			Du texte en complement, a completer si besoin
		</div>
		<div class="contact__form">
			<!-- To be completed with the contact form -->
		</div>
	</section>
@endsection

@section('scripts')

@endsection