<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>{{ __('pdf.order-page-title') }}</title>

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
			<div style="position: relative; padding-left: 0px; margin-bottom: 80px; height: 120px;">
				<div style="position: absolute; top: 0; left: 0px;">
					<img src="{{ asset('images/pictures/logo_benu_green.png') }}" style="height: 150px;" />
				</div>
				<div style="position: absolute; top: 0px; left: 60px;">
					<p style="font-family: 'Barlow Condensed'; margin-bottom: 0px; padding-bottom: 0px;">
						<span style="font-weight: 600">BENU Village Esch asbl</span>
						<br/>
						32 rue d'Audun
						<br/>
						4018 Esch-sur-Alzette
						<br/>
						Luxembourg
						<br/>
						+352 27 91 19 49
						<br/>
						<span style="color: #27955B; font-weight: 500;">
							benu@benu.lu
						</span>
					</p>
				</div>
			</div>

			<div style="position: relative; width: 100%; margin-bottom: 10px;">
				{{ __('pdf.order-txt-left-1') }} {{ __('pdf.order-client') }} : {{ $order->user->client_number }}
			</div>

			<div style="position: relative; width: 100%; margin-bottom: 10px;">
				<div style="position: absolute; width: 30px; top: 5px; left: 0; text-align: left;">
					<img src="{{ asset('images/pictures/puce_village.png') }}" style="height: 18px; width: 18px;" />
				</div>
				<div style="position: relative; width: 95%; top: 0; left: 40px; text-align: left;">
					{{ __('pdf.order-txt-left-bullet-1') }}
				</div>
			</div>
			<div style="position: relative; width: 100%; margin-bottom: 10px;">
				<div style="position: absolute; width: 30px; top: 5px; left: 0; text-align: left;">
					<img src="{{ asset('images/pictures/puce_village.png') }}" style="height: 18px; width: 18px;" />
				</div>
				<div style="position: relative; width: 95%; top: 0; left: 40px; text-align: left;">
					{{ __('pdf.order-txt-left-bullet-2') }}
				</div>
			</div>
			<div style="position: relative; width: 100%; margin-bottom: 10px;">
				<div style="position: absolute; width: 30px; top: 5px; left: 0; text-align: left;">
					<img src="{{ asset('images/pictures/puce_village.png') }}" style="height: 18px; width: 18px;" />
				</div>
				<div style="position: relative; width: 95%; top: 0; left: 40px; text-align: left;">
					{{ __('pdf.order-txt-left-bullet-3') }}
				</div>
			</div>
			<div style="position: relative; width: 100%; margin-bottom: 10px;">
				<div style="position: absolute; width: 30px; top: 5px; left: 0; text-align: left;">
					<img src="{{ asset('images/pictures/puce_village.png') }}" style="height: 18px; width: 18px;" />
				</div>
				<div style="position: relative; width: 95%; top: 0; left: 40px; text-align: left;">
					{{ __('pdf.order-txt-left-bullet-4') }}
				</div>
			</div>

			<div style="text-align: center; font-size: 1.4rem; font-weight: 500; margin-bottom: 15px;">
				<em>{{ __('pdf.order-txt-left-wrapped-by') }}</em>
			</div>

			<div style="position: relative; width: 100%; margin-bottom: 10px;">
				{{ __('pdf.order-txt-left-2') }}
			</div>

			<div style="position: relative; width: 100%; color: #27955B;">
				{{ __('pdf.order-txt-left-3') }}
			</div>
			<div style="position: relative; width: 100%; margin-bottom: 10px;">
				{{ __('pdf.order-txt-left-4') }} <span style="font-weight: 500;">{{ __('pdf.order-txt-left-phone-number') }}</span>, <span style="color: #27955B;">{{ __('pdf.order-txt-left-email') }}</span> {{ __('pdf.order-txt-left-5') }} <span style="color: #27955B;">www.benucouture.lu</span>.
			</div>

			<div style="position: relative; width: 100%; margin-bottom: 10px;">
				{{ __('pdf.order-txt-left-6') }}
			</div>

			<div style="position: relative; width: 100%; margin-bottom: 10px;">
				{{ __('pdf.order-txt-left-7') }}
			</div>
		</section>


		<section style="position: absolute; top: 0; left: 50%; width: 50%; padding-left: 20px;">
			<div style="position: absolute; left: 23%; bottom: 50%; padding-left: 0px; transform: rotate(-90deg); font-size: 1.5rem; color: rgb(60, 60, 60);">
				<div style="position: absolute; top: 40px; left: 60px; width: 200px;">
					<p style="font-family: 'Barlow Condensed'; margin-bottom: 0px; padding-bottom: 0px;">
						{{ ucfirst($order->user->first_name) }} {{ ucfirst($order->user->last_name) }}
						<br/>
						@if($order->address_id !== 0)
						{{ $order->address->street_number }} {{ $order->address->street }}
						<br/>
						{{ $order->address->zip_code }} {{ $order->address->city }}
						<br/>
						{{ $order->address->country }}
						<br/>
						@endif
						{{ __('pdf.order-client-number') }} {{ $order->user->client_number }}
					</p>
				</div>
			</div>

			<div style="position: absolute; left: 20px; bottom: 0; padding-left: 0px; transform: rotate(-90deg);">
				<div style="position: absolute; top: 0; left: 0px;">
					<img src="{{ asset('images/pictures/logo_benu_green.png') }}" style="height: 150px;" />
				</div>
				<div style="position: absolute; top: 40px; left: 60px; width: 150px;">
					<p style="font-family: 'Barlow Condensed'; margin-bottom: 0px; padding-bottom: 0px;">
						<span style="font-weight: 600">BENU Village Esch asbl</span>
						<br/>
						32 rue d'Audun
						<br/>
						4018 Esch-sur-Alzette
						<br/>
						Luxembourg
					</p>
				</div>
			</div>

			<div style="position: absolute; right: 50px; bottom: 75px; padding-left: 0px; transform: rotate(-90deg);">
				<div style="font-size: 1.2rem; color: #27955B;">
					{{ __('pdf.order-bottom-right-title') }}
				</div>
				<div style="position: absolute; top: 40px; left: 0px;">
					<img src="{{ asset('images/pictures/carton.png') }}" style="height: 60px; width: 60px;" />
					<div style="color: #27955B; text-align: center; width: 60px; font-size: 0.9rem; line-height: 0.8rem; padding-top: 5px;">
						{{ __('pdf.order-bottom-right-picto-txt-1') }}
					</div>
				</div>
				<div style="position: absolute; top: 40px; left: 70px;">
					<img src="{{ asset('images/pictures/glue.png') }}" style="height: 60px; width: 60px;" />
					<div style="color: #27955B; text-align: center; width: 60px; font-size: 0.9rem; line-height: 0.8rem; padding-top: 5px;">
						{{ __('pdf.order-bottom-right-picto-txt-2') }}
					</div>
				</div>
				<div style="position: absolute; top: 40px; left: 140px;">
					<img src="{{ asset('images/pictures/sac_plastique.png') }}" style="height: 60px; width: 60px;" />
					<div style="color: #27955B; text-align: center; width: 60px; font-size: 0.9rem; line-height: 0.8rem; padding-top: 5px;">
						{{ __('pdf.order-bottom-right-picto-txt-3') }}
					</div>
				</div>
				<div style="position: absolute; top: 40px; left: 210px;">
					<img src="{{ asset('images/pictures/imprimante.png') }}" style="height: 60px; width: 60px;" />
					<div style="color: #27955B; text-align: center; width: 60px; font-size: 0.9rem; line-height: 0.8rem; padding-top: 5px;">
						{{ __('pdf.order-bottom-right-picto-txt-4') }}
					</div>
				</div>
			</div>
		</section>
	</div>
</body>
</html>