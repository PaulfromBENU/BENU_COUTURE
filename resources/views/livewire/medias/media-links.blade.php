<div class="flex justify-start flex-wrap media-links">
    @if($medias == null || $medias->count() == 0)
        {{ __('footer.medias-no-media-for-the-moment') }}
    @else
        @foreach($medias as $media)
            @if($media->doc_name !== null && $media->doc_name !== "")
                <a href="{{ asset($media->doc_name) }}" class="media-links__card" download>
            @else
                <a href="{{ $media->link }}" target="_blank" class="media-links__card">
            @endif
                    <div class="media-links__card__icon">
                        
                    </div>
                    <h3>
                        {{ $media->title }}
                    </h3>
                    <p class="media-links__card__subtxt">
                        {{ Carbon\Carbon::parse($media->publication_date)->format('m.Y') }}
                    </p>
                    <div class="media-links__card__language">
                        {{ $media->language }}
                    </div>
                </a>
        @endforeach

        @if($total_count > $cards_number)
            <div class="media-links__more w-full">
                <button class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover m-auto" wire:click="displayMoreCards">
                    {{ __('footer.medias-show-more') }}
                </button>
            </div>
        @endif
    @endif
</div>
