<div class="model-articles__list flex flex-wrap justify-start benu-container">
    @foreach($articles as $article)
        @livewire('components.sold-article-overview', ['article' => $article], key($article->id))
    @endforeach
</div>