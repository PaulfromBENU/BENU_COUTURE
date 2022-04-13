<section class="benu-container welcome-others">
	<h3 class="text-center">
		{{ __('welcome.others-title') }}
	</h3>
	<p>
		{{ __('welcome.others-words') }}
	</p>

	<div class="flex justify-center flex-wrap">
		<div class="welcome-others__block">
			<a href="{{ route('model-'.app()->getLocale(), ['family' => 'clothes']) }}">
				<div class="welcome-others__svg-container">
						@svg('icon_benu_couture_vetements_OK')
					<h4>
						{{ __('welcome.icon-clothes') }}
					</h4>
				</div>
			</a>
		</div>
		<div class="welcome-others__block">
			<a href="{{ route('model-'.app()->getLocale(), ['family' => 'accessories']) }}">
				<div class="welcome-others__svg-container">
						@svg('icon_benu_couture_accessoires_OK')
					<h4>
						{{ __('welcome.icon-accessories') }}
					</h4>
				</div>
			</a>
		</div>
		<div class="welcome-others__block">
			<a href="{{ route('model-'.app()->getLocale(), ['family' => 'home']) }}">
				<div class="welcome-others__svg-container">
						@svg('icon_benu_couture_home_OK')
					<h4>
						{{ __('welcome.icon-home') }}
					</h4>
				</div>
			</a>
		</div>
	</div>
	<!-- <a href="{{ route('model-'.app()->getLocale()) }}" class="block welcome-others__plus">
		<div class="welcome-others__plus__symbol">
			+
		</div>
	</a> -->
</section>