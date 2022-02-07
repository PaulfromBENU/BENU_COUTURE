@extends('layouts.base_layout')

@section('title')
	{{ __('service.seo-title') }}
@endsection

@section('description')
	{{ __('service.seo-description') }}
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs pattern-bg">
		<div class="benu-container breadcrumbs__content flex justify-start">
			<a href="{{ route('home', [app()->getLocale()]) }}">{{ __('breadcrumbs.home') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('partners-'.app()->getLocale()) }}" class="primary-color"><strong>{{ __('breadcrumbs.partners') }}</strong></a>
		</div>
	</div>
@endsection

@section('main-content')
	<section class="partners flex justify-between benu-container">
		<div class="w-1/5">
			<h2 class="partners__side-title">Nos partenaires</h2>
			<p class="partners__side-txt">
				Suspendisse nec imperdiet turpis, nec dictum dui. Duis maximus enim lorem, elementum auctor arcu egestas eget. Suspendisse nec imperdiet turpis, nec dictum dui. Duis maximus enim lorem, elementum auctor arcu egestas eget.Suspendisse nec imperdiet turpis, nec dictum dui. Duis maximus enim lorem.
			</p>
		</div>
		<div class="w-9/12">
			@for($i = 0; $i < 3; $i++)
			<div class="partners__box flex justify-start">
				<div class="partners__box__img-container">
					<img src="{{ asset('images/pictures/partners/repair_cafe.png') }}">
				</div>
				<div class="partners__box__txt-container">
					<div class="flex justify-between">
						<h3 class="partners__box__title">Repair Café Lëtzebuerg</h3>
						<p>
							<a href="{{ route('model') }}" class="btn-couture-plain">Voir tous les articles</a>
						</p>
					</div>
					<p class="partners__box__desc">
						Repair Café Lëtzebuerg organise des Repair Cafés. Ce sont des réunions volontaires où les participants travaillent ensemble pour réparer leurs objets cassés: petits appareils électriques, vêtements, vélos, jouets, petits meubles et bien plus encore.
					</p>
					<div class="text-left partners__box__highlight">
						<div class="flex justify-start">
							<p class="w-7/12 mb-2">
								<strong>Adresse&nbsp;:</strong> 34, r. Josy Welter, 7256 Walferdange
							</p>
							<p>
								<strong>E-mail&nbsp;:</strong> <span class="primary-color"><a href="mailto:repaircafe@cell.lu" class="partners__box__link" target="_blank">repaircafe@cell.lu</a></span>
							</p>
						</div>
						<div class="flex justify-start">
							<p class="w-7/12">
								<strong>Téléphone&nbsp;:</strong> +352 26 33 28 19
							</p>
							<p>
								<strong>Site&nbsp;:</strong> <span class="primary-color"><a href="https://www.repaircafe.lu/" class="partners__box__link" target="_blank">www.repaircafe.lu</a></span>
							</p>
						</div>
					</div>
				</div>
			</div>
			@endfor
		</div>
	</section>
@endsection

@section('scripts')

@endsection