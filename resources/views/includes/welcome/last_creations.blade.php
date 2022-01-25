<section class="welcome-creations">
	<div class="benu-container">
		<h2 class="welcome-creations__title">Les dernières créations</h2>
		<p class="welcome-creations__subtitle">
			Suspendisse nec imperdiet turpis, nec dictum dui. Duis maximus enim lorem, elementum auctor arcu egestas eget. Suspendisse nec imperdiet turpis, nec dictum dui. Duis maximus enim lorem, elementum auctor arcu egestas.
		</p>
		<div class="welcome-creations__list flex flex-wrap justify-between">
			@for($i = 0; $i < 6; $i++)
				@include('includes.components.model_overview')
			@endfor
			<div class="text-center welcome-creations__list__link">
				<a href="#" class="">Voir toutes les créations</a>
			</div>
		</div>
	</div>
</section>