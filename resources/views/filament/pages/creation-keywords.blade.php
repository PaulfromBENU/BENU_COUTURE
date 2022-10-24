<x-filament::page class="keywords">
	<h2>Select a creation to see and update keywords</h2>

	<div class="flex justify-between mb-10 sell-form__input-group">
		<div class="flex justify-start flex-wrap">
			<div>
				<label for="creation-0">Creation</label><br/>
				<select id="creation-0" class="sell-form__select" wire:model="creation_name">
					<option value="none-0" wire:click="selectCreation(0)">Select a creation</option>
					@foreach($all_creations as $creation)
						<option value="{{ $creation->name }}" wire:key="creations-options-{{ $creation->id }}" wire:click="selectCreation({{ $creation->id }})">{{ $creation->name }}</option>
					@endforeach
				</select> 
			</div>
		</div>
	</div>

	@if($selected_creation !== null)
	<div>
		<h3>Current keywords:</h3>
		@foreach($existing_keywords as $existing_keyword)
			<div wire:key="existing-keyword-{{ $existing_keyword->id }}">
				<h4 style="margin-top: 30px;">Keyword {{ $loop->index + 1 }} - @if(!in_array($existing_keyword->id, $deleted_keywords)) <button class="keywords__low-btn" wire:click="deleteKeyword({{ $existing_keyword->id }})">Remove</button> @else To be removed @endif</h4>
				<div class="flex justify-start">
					<div class="keywords__fields">
						<label>LU</label><br/>
						<textarea name="keyword-lu-{{ $existing_keyword->id }}" wire:model.defer="keywords.{{ $existing_keyword->id }}.lu" rows="2" @if(in_array($existing_keyword->id, $deleted_keywords)) disabled @endif></textarea>
					</div>
					<div class="keywords__fields">
						<label>FR</label><br/>
						<textarea name="keyword-fr-{{ $existing_keyword->id }}" wire:model.defer="keywords.{{ $existing_keyword->id }}.fr" @if(in_array($existing_keyword->id, $deleted_keywords)) disabled @endif></textarea>
					</div>
					<div class="keywords__fields">
						<label>DE</label><br/>
						<textarea name="keyword-de-{{ $existing_keyword->id }}" wire:model.defer="keywords.{{ $existing_keyword->id }}.de" @if(in_array($existing_keyword->id, $deleted_keywords)) disabled @endif></textarea>
					</div>
					<div class="keywords__fields">
						<label>EN</label><br/>
						<textarea name="keyword-en-{{ $existing_keyword->id }}" wire:model.defer="keywords.{{ $existing_keyword->id }}.en" @if(in_array($existing_keyword->id, $deleted_keywords)) disabled @endif></textarea>
					</div>
				</div>
			</div>
		@endforeach

		<div style="margin-top: 40px;">
			<h3>New keywords:</h3>
		@for($i = 1; $i <= $new_keywords_count; $i++)
			<div class="flex justify-start" style="margin-top: 30px;" wire:key="new-keywords-{{ $i }}">
				<div class="keywords__fields">
					<label>LU</label><br/>
					<textarea name="new-keyword-lu-{{ $i }}" wire:model.defer="new_keywords.{{ $i }}.lu"></textarea>
				</div>
				<div class="keywords__fields">
					<label>FR</label><br/>
					<textarea name="new-keyword-fr-{{ $i }}" wire:model.defer="new_keywords.{{ $i }}.fr"></textarea>
				</div>
				<div class="keywords__fields">
					<label>DE</label><br/>
					<textarea name="new-keyword-de-{{ $i }}" wire:model.defer="new_keywords.{{ $i }}.de"></textarea>
				</div>
				<div class="keywords__fields">
					<label>EN</label><br/>
					<textarea name="new-keyword-en-{{ $i }}" wire:model.defer="new_keywords.{{ $i }}.en"></textarea>
				</div>
			</div>
		@endfor
		</div>

		<div class="text-center" style="margin-top: 20px;">
			<button wire:click="addKeyword" class="keywords__low-btn">Add new keyword</button>
		</div>

		<div class="keywords__validation">
			<button class="keywords__large-btn" wire:click="updateKeywords">Confirm updates</button>
		</div>
	</div>
	@endif
</x-filament::page>
