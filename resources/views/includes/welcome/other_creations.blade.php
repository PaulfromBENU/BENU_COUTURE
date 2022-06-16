<section class="benu-container welcome-others">
	<h3 class="text-center">
		{{ __('welcome.others-title') }}
	</h3>
	<p>
		@if(date('m') > 4 && date('m') < 10)
		<a href="{{ route('model-'.app()->getLocale(), ['family' => 'clothes', 'categories' => 'sweaters']) }}">{{ __('welcome.other-words-sweater') }}</a>
		<a href="{{ route('model-'.app()->getLocale(), ['family' => 'accessories', 'categories' => 'home']) }}">{{ __('welcome.other-words-home-accessories') }}</a>
		<a href="{{ route('model-'.app()->getLocale(), ['family' => 'clothes', 'categories' => 'jackets-vests']) }}">{{ __('welcome.other-words-jacket') }}</a>
		<a href="{{ route('model-'.app()->getLocale(), ['family' => 'clothes', 'types' => 'ladies', 'categories' => 'blouses-shirts']) }}">{{ __('welcome.other-words-ladies-shirts') }}</a>
		<a href="{{ route('model-'.app()->getLocale(), ['family' => 'accessories']) }}">{{ __('welcome.other-words-sleep-masks') }}</a>
		<a href="{{ route('model-'.app()->getLocale(), ['family' => 'clothes', 'types' => 'ladies', 'categories' => 'trousers']) }}">{{ __('welcome.other-words-ladies-trousers') }}</a>
		<a href="{{ route('model-'.app()->getLocale(), ['family' => 'clothes', 'types' => 'gentlemen', 'categories' => 'cardigans']) }}">{{ __('welcome.other-words-gentlement-cardigans') }}</a>
		<a href="{{ route('model-'.app()->getLocale(), ['family' => 'clothes', 'types' => 'gentlemen', 'categories' => 'jackets-vests']) }}">{{ __('welcome.other-words-gentlemen-vests') }}</a>
		@else
		Ici les liens pour les creations hiver
		@endif
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