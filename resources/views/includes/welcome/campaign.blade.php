<section class="benu-container welcome-campaign">
	<div class="flex justify-between lg:flex-wrap flex-col-reverse lg:flex-row">
		<div class="welcome-campaign__left">
			<p class="welcome-campaign__left__title-1">{{ __('welcome.campaign-title-1') }}</p>
			<p class="welcome-campaign__left__title-2">{{ __('welcome.campaign-title-2') }}</p>
			<div class="flex flex-col-reverse lg:flex-col">
				<div class="welcome-campaign__left__img-container">
					<img src="{{ asset('images/pictures/campaigns/DSC09261006.png') }}" class="m-auto">
				</div>
				<div class="flex justify-center flex-wrap welcome-campaign__left__links">
					<a href="{{ route('campaign-single-'.app()->getLocale(), ['slug' => 'carte-blanche']) }}" class="block btn-couture">{{ __('welcome.campaign-link-1') }}</a>
					<!-- <a href="#" class="block btn-couture">{{ __('welcome.campaign-link-2') }}</a> -->
				</div>
			</div>
		</div>
		<div class="welcome-campaign__right">
			<img src="{{ asset('images/pictures/campaigns/BC_WS_Photos_PoliticalDeclaration_8.jpg') }}" class="m-auto">
		</div>
	</div>
</section>