<section class="model-sold pattern-bg">
	<div class="benu-container">
		<h2 class="model-sold__title">Les déclinaisons vendues</h2>
		<p class="model-sold__subtitle w-1/2 m-auto">
			Suspendisse nec imperdiet turpis, nec dictum dui. Duis maximus enim lorem, elementum auctor arcu egestas eget. Suspendisse nec imperdiet turpis, nec dictum dui. Duis maximus enim lorem, elementum auctor arcu egestas.
		</p>
		<div class="flex flex-wrap justify-start model-sold__list">
			@foreach($sold_articles as $article)
				@livewire('components.sold-article-overview', ['article' => $article], key($article->id))
			@endforeach
		</div>
		<div class="model-sold__link">
			<a href="{{ route('sold-'.app()->getLocale(), ['name' => strtolower($model->name)]) }}" class="btn-slider-left m-auto">Voir toutes les déclinaisons vendues</a>
		</div>
	</div>
</section>