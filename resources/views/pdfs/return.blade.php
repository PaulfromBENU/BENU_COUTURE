<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Votre formulaire de retour BENU COUTURE</title>

	<style type="text/css">
		@font-face {
			font-family: "Barlow Condensed";
			font-weight: 400;
			font-style: normal;
			src: url({{ storage_path('fonts/BarlowCondensed/BarlowCondensed-Regular.ttf') }}) format('truetype');
		}

		@font-face {
			font-family: "Barlow Condensed";
			font-weight: 300;
			font-style: italic;
			src: url({{ storage_path('fonts/BarlowCondensed/BarlowCondensed-LightItalic.ttf') }}) format('truetype');
		}

		@font-face {
			font-family: "Barlow Condensed";
			font-weight: 500;
			font-style: normal;
			src: url({{ storage_path('fonts/BarlowCondensed/BarlowCondensed-Medium.ttf') }}) format('truetype');
		}

		@font-face {
			font-family: "Barlow Condensed";
			font-weight: 500;
			font-style: italic;
			src: url({{ storage_path('fonts/BarlowCondensed/BarlowCondensed-MediumItalic.ttf') }}) format('truetype');
		}

		@font-face {
			font-family: "Barlow Condensed";
			font-weight: 600;
			font-style: normal;
			src: url({{ storage_path('fonts/BarlowCondensed/BarlowCondensed-SemiBold.ttf') }}) format('truetype');
		}

		.checkbox {
			position: absolute;
			left: 0;
			top: 0;
			height: 10px;
			width: 10px;
			border: solid 1px grey;
			margin-top: 7px;
		}

		.checkbox-label {
			position: absolute;
			left: 20px;
			top: 0;
			height: 30px;
		}

		.textbox {
			width: 100%;
			height: 30px;
			border: solid 1px grey;
			margin-bottom: 10px;
		}
	</style>
</head>
<!-- To use a landscape format, use $pdf->set_paper('A4', 'landscape'); in the controller -->
<body style="width: 100%; margin-left: 0%; font-family: 'Barlow Condensed'; font-weight: 400; font-size: 0.9rem; position: relative;">
	<div style="width: 100%; height: 100%;">
		<section style="position: absolute; top: 0; left: 0; width: 50%; height: 100%; border-right: dashed lightgrey 2px; padding-right: 20px;">
			<div style="position: relative; padding-left: 0px; margin-bottom: 50px; height: 120px;">
				<div style="position: absolute; top: 0; left: 0px;">
					<img src="{{ asset('images/pictures/logo_benu_green.png') }}" style="height: 150px;" />
				</div>
				<div style="position: absolute; top: 0px; left: 60px;">
					<p style="font-family: 'Barlow Condensed'; margin-bottom: 0px; padding-bottom: 0px;">
						<span style="font-weight: 600">BENU Village Esch asbl</span>
						<br/>
						51 rue d'Audun
						<br/>
						4018 Esch-sur-Alzette
						<br/>
						Luxembourg
						<br/>
						+352 27 91 19 49
						<br/>
						<span style="color: #27955B; font-weight: 500;">
							benu@benuvillageesch.lu
						</span>
					</p>
				</div>
			</div>

			<div style="position: absolute; top: 0px; left: 65%; width: 35%;">
				<p style="font-family: 'Barlow Condensed'; margin-bottom: 0px; padding-left: 0px;">
					<span style="font-weight: 600">Bon de retour</span>
					@if($order !== null)
						<br/>
						{{ ucfirst(strtolower($order->user->last_name)) }} {{ ucfirst(strtolower($order->user->first_name)) }}
						<br/>
						@if($order->address_id !== 0)
						{{ $order->address->street_number }} {{ $order->address->street }}
						<br/>
						{{ $order->address->zip_code }}
						<br/>
						{{ $order->address->city }}, {{ $order->address->country }}
						<br/>
						@else
						Retrait en magasin
						<br/>
						@endif
					@else
					<br/>
					 Nom :
					 <br/><br/>
					 Adresse :
					@endif
				</p>
			</div>

			<div style="position: relative; width: 100%; height: 30px;">
				<div style="font-weight: 600; position: absolute; left: 0; top: 0; width: 65%; text-align: left;">
					N<sup>o</sup> client : @if($order !== null) {{ $order->user->client_number }} @endif
				</div>
				<div style="font-weight: 600; position: absolute; left: 67%; top: 0; width: 33%; text-align: left;">
					N<sup>o</sup> commande : @if($order !== null) {{ $order->unique_id }} @endif
				</div>
			</div>

			<div style="position: relative; width: 100%; min-height: 250px;">
				<div style="position: relative; color: #27955B; font-weight: 600; font-size: 1.2rem; border-bottom: solid 2px #27955B; height: 55px;">
					<p style="position: absolute; width: 50%; top: 0; left: 0; text-align: left;">
						Article
					</p>
					<p style="position: absolute; width: 15%; top: 0; left: 50%; text-align: center;">
						Prix TTC
					</p>
					<p style="position: absolute; width: 35%; top: 0; left: 65%; text-align: center;">
						Quantité à retourner
					</p>
				</div>
				@if($order !== null)
					@foreach($order->cart->couture_variations as $article)
						@if($article->name == 'voucher')
							<div style="position: relative; font-weight: 500; font-size: 1rem; border-bottom: solid 1px lightgrey; height: 45px;">
								<p style="position: absolute; width: 50%; top: 0; left: 0; text-align: left;">
									{{ __('pdf.invoice-voucher') }} - {{ __('pdf.invoice-voucher-type') }} @if($article->voucher_type == 'pdf') PDF @else {{ __('pdf.invoice-voucher-type-clothe') }} @endif
								</p>
								<p style="position: absolute; width: 15%; top: 0; left: 50%; text-align: center;">
									{{ $article->pivot->value }}&euro;
								</p>
								<p style="position: absolute; width: 35%; top: 0; left: 65%; text-align: center;"></p>
							</div>
						@else
							<div style="position: relative; font-weight: 500; font-size: 1rem; border-bottom: solid 1px lightgrey; height: 45px;">
								<p style="position: absolute; width: 50%; top: 0; left: 0; text-align: left;">
									{{ strtoupper($article->name) }}
								</p>
								<p style="position: absolute; width: 15%; top: 0; left: 50%; text-align: center;">
									@if($article->is_extra_accessory == '1')
									{{ $article->specific_price }}&euro;
									@else
									{{ $article->creation->price }}&euro;
									@endif
								</p>
								<p style="position: absolute; width: 35%; top: 0; left: 65%; text-align: center;"></p>
							</div>
							@if($article->pivot->with_extra_article)
							<div style="position: relative; font-weight: 500; font-size: 1rem; border-bottom: solid 1px lightgrey; height: 45px;">
								<p style="position: absolute; width: 50%; top: 0; left: 0; text-align: left;">
									+ {{ __('pdf.invoice-aditionnal-pillow') }}
								</p>
								<p style="position: absolute; width: 15%; top: 0; left: 50%; text-align: center;">
									{{ round(10 / (1 + $article->creation->tva_value/100), 2) }}&euro;
								</p>
								<p style="position: absolute; width: 35%; top: 0; left: 65%; text-align: center;"></p>
							</div>
							@endif
						@endif
					@endforeach
				@else 
					<div style="position: relative; font-weight: 500; font-size: 1rem; border-bottom: solid 1px lightgrey; height: 45px;">
						<p style="position: absolute; width: 50%; top: 0; left: 0; text-align: left;">
							
						</p>
						<p style="position: absolute; width: 15%; top: 0; left: 50%; text-align: right;">
							&euro;
						</p>
						<p style="position: absolute; width: 35%; top: 0; left: 65%; text-align: center;"></p>
					</div>
					<div style="position: relative; font-weight: 500; font-size: 1rem; border-bottom: solid 1px lightgrey; height: 45px;">
						<p style="position: absolute; width: 50%; top: 0; left: 0; text-align: left;">
							
						</p>
						<p style="position: absolute; width: 15%; top: 0; left: 50%; text-align: right;">
							&euro;
						</p>
						<p style="position: absolute; width: 35%; top: 0; left: 65%; text-align: center;"></p>
					</div>
					<div style="position: relative; font-weight: 500; font-size: 1rem; border-bottom: solid 1px lightgrey; height: 45px;">
						<p style="position: absolute; width: 50%; top: 0; left: 0; text-align: left;">
							
						</p>
						<p style="position: absolute; width: 15%; top: 0; left: 50%; text-align: right;">
							&euro;
						</p>
						<p style="position: absolute; width: 35%; top: 0; left: 65%; text-align: center;"></p>
					</div>
				@endif
			</div>

			<div style="position: relative; height: 30px;">
				<div style="position: absolute; top: 0; left: 0; width: 100px; height: 40px; font-weight: 600;">
					Raison du retour : 
				</div>
				<div style="position: absolute; top: 0; left: 110px;">
					<div style="position: relative;">
						<div class="checkbox"></div>
						<div class="checkbox-label" style="width: 150px;">
							L'article ne me plait pas
						</div>
					</div>
				</div>
				<div style="position: absolute; top: 0; left: 280px;">
					<div style="position: relative;">
						<div class="checkbox"></div>
						<div class="checkbox-label" style="width: 150px;">
							L'article ne me convient pas
						</div>
					</div>
				</div>
			</div>
			<div style="position: relative; height: 80px;">
				<div style="position: absolute; top: 0; left: 110px;">
					<div style="position: relative;">
						<div class="checkbox"></div>
						<div class="checkbox-label" style="width: 70px;">
							Erreur BENU
						</div>
					</div>
				</div>
				<div style="position: absolute; top: 0; left: 220px;">
					<div style="position: relative;">
						<div class="checkbox"></div>
						<div class="checkbox-label" style="width: 220px;">
							L'article n'est pas celui que j'ai comnmandé
						</div>
					</div>
				</div>
			</div>

			<div style="position: relative; margin-top: -40px;">
				<div style="font-weight: 600;">
					Autre :
				</div>
				<div class="textbox"></div>
				<div style="font-weight: 600;">
					IBAN
				</div>
				<div class="textbox"></div>
				<div style="font-weight: 600;">
					Titulaire du compte
				</div>
				<div class="textbox"></div>
			</div>
		</section>
		<section style="position: absolute; top: 0; left: 50%; width: 50%; padding-left: 20px;">
			<div style="width: 100%; height: 50%; border-bottom: dashed 2px lightgrey; position: relative;">
				<div style="position: absolute; left: 55%; top: 0;">
					<div style="text-transform: uppercase; color: gray; font-weight: 600; font-size: 1.2rem;">
						Expéditeur
					</div>
					<div style="font-size: 1.1rem; font-weight: 500;">
						@if($order !== null)
							{{ ucfirst(strtolower($order->user->last_name)) }} {{ ucfirst(strtolower($order->user->first_name)) }}
							<br/>
							@if($order->address_id !== 0)
							{{ $order->address->street_number }} {{ $order->address->street }}
							<br/>
							{{ $order->address->zip_code }}
							<br/>
							{{ $order->address->city }}, {{ $order->address->country }}
							<br/>
							@else
							Retrait en magasin
							<br/>
							@endif
						@else
							Nom et adresse :
							<br/><br/><br/>
						@endif
					</div>
					<div style="padding-top: 20px; font-size: 1.2rem; font-weight: 500;">
						N<sup>o</sup> client : @if($order !== null) {{ $order->user->client_number }} @endif
					</div>
				</div>

				<div style="position: absolute; padding-left: 40px; top: 160px;">
					<div style="text-transform: uppercase; color: gray; font-size: 1.2rem; font-weight: 500;">
						Destinataire
					</div>
					<div style="font-size: 1.3rem; font-weight: 500;">
						BENU VILLAGE Esch ASBL
						<br/>
						51 rue d'Audun
						<br/>
						L-4018 Esch-sur-Alzette
						<br/>
						Luxembourg
					</div>
				</div>
			</div>

			<div style="width: 100%; height: 50%; padding-left: 40px; padding-top: 35px;">
				<p style="font-weight: 600; font-size: 1.3rem;">
					Instructions de retour
				</p>
				<p style="font-size: 1.1rem;">
					Lorem ipsum ...
				</p>
			</div>
		</section>
	</div>


	<!-- <footer style="position: absolute; bottom: 0; left: 0; width: 100%; height: 30px; border-top: solid 1px lightgrey;">
		<p style="position: absolute; padding-top: 5px; left: 0; width: 50%;">
			<span style="font-family: 'Barlow Condensed SemiBold';">BENU VILLAGE ESCH ASBL</span> | RCS F11364 | TVA : LU 30223580
		</p>
		<p style="text-align: right; position: absolute; left: 50%; width: 50%;">
			IBAN | BCEELULL LU63 0019 5055 5246 0000
		</p>
	</footer> -->
</body>
</html>