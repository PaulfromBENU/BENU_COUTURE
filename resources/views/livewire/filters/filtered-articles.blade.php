<div class="model-articles__list flex flex-wrap justify-start benu-container">
    @if($articles->count() == 0)
        <div class="filter-no-result">
            Malheureusement, il n'y a aucun article correspondant actuellement à votre recherche...
        </div>
    @endif
    @foreach($articles as $article)
        @livewire('components.article-overview', ['article' => $article], key($article->id))
    @endforeach
</div>