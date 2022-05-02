<section class="model-articles" id="model-extra-accessories">
	@if($extra_accessories->count() > 0)
	<h2>{{ __('models.extra-articles-title') }}</h2>
	<div class="model-articles__list flex flex-wrap justify-start benu-container">
	    @foreach($extra_accessories as $article)
	        @livewire('components.article-overview', ['article' => $article], key('extra-'.$article->id))
	    @endforeach
	</div>
	@endif
</section>