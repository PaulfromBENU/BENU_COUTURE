<x-filament::page>
	<form method="POST" wire:submit.prevent="saveStock" class="stock-handling">
		@csrf

		<h2>Select an item to update the stock</h2>

		<div class="flex justify-between mb-10 stock-handling__input-group">
			<div class="flex justify-start flex-wrap">
				<div>
					<label for="creation-0">Creation</label><br/>
					<select name="creation-0" id="creation-0" class="stock-handling__select" wire:model="creation_name">
						<option value="none-0" wire:click="adaptVariations(0)">Select a creation</option>
						@foreach($all_creations as $creation)
							<option value="{{ $creation->name }}" wire:key="stock-creation-{{ $creation->id }}" wire:click="adaptVariations({{ $creation->id }})">{{ $creation->name }}</option>
						@endforeach
					</select> 
				</div>
				<div>
					<label for="variation-0">Variation</label><br/>
					<select name="variation-0" id="variation-0" class="stock-handling__select" wire:model="variation_name">
						<option value="none-0">Select a variation</option>
						@foreach($computed_variations as $variation)
							<option value="{{ $variation->name }}" wire:key="stock-variation-{{ $variation->id }}" wire:click="adaptStock">{{ $variation->name }}</option>
						@endforeach
					</select> 
				</div>
			</div>
		</div>

		<h2>Stock in Shops</h2>
		<div class="flex justify-start stock-handling__stock-container">
			@foreach($all_shops as $shop)
				<div wire:key="stock-shops-{{ $shop->id }}" class="stock-handling__stock">
					<p>
						{{ $shop->name }}
					</p>
					<input type="text" name="shop_name" wire:model.defer="stock_by_shop.{{ $shop->filter_key }}">
				</div>
			@endforeach
		</div>

		<div class="text-center">
			<button type="submit">Update stock</button>
		</div>
	</form>
</x-filament::page>
