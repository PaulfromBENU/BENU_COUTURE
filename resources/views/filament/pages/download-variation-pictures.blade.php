<x-filament::page>
	<h2>Select a variation to download pictures</h2>

	<div class="flex justify-between mb-10 stock-handling__input-group">
		<div class="flex justify-start flex-wrap">
			<div>
				<label for="creation-0">Creation</label><br/>
				<select name="creation-0" id="creation-0" class="stock-handling__select" wire:model="creation_id">
					<option value="0" wire:click="adaptVariations(0)">Select a creation</option>
					@foreach($all_creations as $creation)
						<option value="{{ $creation->id }}" wire:key="stock-creation-{{ $creation->id }}" wire:click="adaptVariations({{ $creation->id }})">{{ $creation->name }}</option>
					@endforeach
				</select> 
			</div>
			<div>
				<label for="variation-0">Variation</label><br/>
				<select name="variation-0" id="variation-0" class="stock-handling__select" wire:model="variation_id">
					<option value="0" wire:click="loadVariationPictures">Select a variation</option>
					@foreach($computed_variations as $variation)
						<option value="{{ $variation->id }}" wire:key="stock-variation-{{ $variation->id }}" wire:click="loadVariationPictures">{{ $variation->name }}</option>
					@endforeach
				</select> 
			</div>
		</div>
	</div>

	@if($variation_id !== 0 && count($photos) > 0)
	<div class="flex justify-start flex-wrap new-photo-form__variations-gallery" style="overflow-y: hidden;">
		@foreach($photos as $photo)
			<figure class="new-photo-form__variations-gallery__img-container text-center">
				<figcaption style="height: 25px;">{{ explode("/", $photo)[2] }}</figcaption>
				<img src="{{ asset('images/pictures/articles/'.$photo) }}" style="margin-bottom: 5px;">
	        </figure>
	    @endforeach
	</div>

	<div class="text-center stock-handling">
		<button wire:click="downloadPictures">Download pictures</button>
	</div>
	@endif
</x-filament::page>
