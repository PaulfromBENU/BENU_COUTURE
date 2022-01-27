<section class="welcome-creations">
	<div class="benu-container">
		<h2 class="welcome-creations__title">{{ __('welcome.last-title') }}</h2>
		<p class="welcome-creations__subtitle">
			{{ __('welcome.last-subtitle') }}
		</p>
		<div class="welcome-creations__list flex flex-wrap justify-between">
			@for($i = 0; $i < 6; $i++)
				@include('includes.components.model_overview')
			@endfor
			<div class="text-center welcome-creations__list__link">
				<a href="#" class="">{{ __('welcome.last-link') }}</a>
			</div>
		</div>
	</div>
</section>