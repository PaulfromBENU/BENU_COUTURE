<div class="model-articles__list flex flex-wrap justify-start benu-container">
    @foreach($articles as $article)
        @livewire('components.article-overview', ['article' => $article], key($article->id))
    @endforeach
</div>