<x-filament::page>
	<div class="create-news">
		@if($show_pending_articles)
		<h1 wire:click="togglePendingArticles(0)">News waiting for validation <span class="text-2xl"><strong>-</strong></span></h1>
		<div style="padding-left: 5px; margin-bottom: 40px;">
		@else
		<h1 wire:click="togglePendingArticles(1)" style="margin-bottom: 20px;">News waiting for validation <span class="text-2xl"><strong>+</strong></span></h1>
		<div style="display: none;">
		@endif
			@if($pending_articles->count() == 0)
				<p>No pending news for the moment...</p>
			@endif
			@foreach($pending_articles as $pending_article)
			<div wire:key="pending-{{ $pending_article->id }}" class="flex create-news__pending">
				<p>
					{{ $pending_article->title_en }}
				</p>
				<p>
					Creation date: {{ $pending_article->created_at->format('d\/m\/Y') }}
				</p>
				<p class="text-right">
					<button wire:click="fillArticleData({{ $pending_article->id }})">Modify</button>
					<button wire:click="sendOnline({{ $pending_article->id }})">Validate</button>
				</p>
			</div>
			@endforeach
		</div>

		@if($show_general_info)
		<h1 wire:click="toggleGeneralInfo(0)">Create or Update News <span class="text-2xl"><strong>-</strong></span></h1>
		<form style="padding-left: 5px; margin-bottom: 40px;" wire:submit.prevent="createNewArticle">
		@else
		<h1 wire:click="toggleGeneralInfo(1)" style="margin-bottom: 20px;">Create or Update News <span class="text-2xl"><strong>+</strong></span></h1>
		<form style="display: none;" wire:submit.prevent="createNewArticle">
		@endif
		@csrf
			<input type="hidden" name="article_id" wire:model="article_id">
			<h2>
				Title of the news
			</h2>
			<section class="flex justify-around create-news__title">
				<div class="create-news__title__input">
					<label>FR:</label><br/>
					<input type="text" name="article_title_fr" wire:model.defer="article_title_fr" placeholder="Title in French" required>
				</div>
				<div class="create-news__title__input">
					<label>LU:</label><br/>
					<input type="text" name="article_title_lu" wire:model.defer="article_title_lu" placeholder="Title in Luxemburgish" required>
				</div>
				<div class="create-news__title__input">
					<label>DE:</label><br/>
					<input type="text" name="article_title_de" wire:model.defer="article_title_de" placeholder="Title in German" required>
				</div>
				<div class="create-news__title__input">
					<label>EN:</label><br/>
					<input type="text" name="article_title_en" wire:model.defer="article_title_en" placeholder="Title in English" required>
				</div>
			</section>

			<h2>
				News slug (format-like-this-for-url)
			</h2>
			<section class="flex justify-around create-news__title">
				<div class="create-news__title__input">
					<label>FR:</label><br/>
					<input type="text" name="article_slug_fr" wire:model.defer="article_slug_fr" placeholder="Slug in French" required>
				</div>
				<div class="create-news__title__input">
					<label>LU:</label><br/>
					<input type="text" name="article_slug_lu" wire:model.defer="article_slug_lu" placeholder="Slug in Luxemburgish" required>
				</div>
				<div class="create-news__title__input">
					<label>DE:</label><br/>
					<input type="text" name="article_slug_de" wire:model.defer="article_slug_de" placeholder="Slug in German" required>
				</div>
				<div class="create-news__title__input">
					<label>EN:</label><br/>
					<input type="text" name="article_slug_en" wire:model.defer="article_slug_en" placeholder="Slug in English" required>
				</div>
			</section>

			<h2>
				News tags
			</h2>
			<section>
				<div class="flex justify-around create-news__title">
					<div class="create-news__title__input">
						<label>Tag 1 FR:</label><br/>
						<input type="text" name="article_tag_1_fr" wire:model.defer="article_tag_1_fr" placeholder="Tag 1 in French">
					</div>
					<div class="create-news__title__input">
						<label>Tag 1 LU:</label><br/>
						<input type="text" name="article_tag_1_lu" wire:model.defer="article_tag_1_lu" placeholder="Tag 1 in Luxemburgish">
					</div>
					<div class="create-news__title__input">
						<label>Tag 1 DE:</label><br/>
						<input type="text" name="article_tag_1_de" wire:model.defer="article_tag_1_de" placeholder="Tag 1 in German">
					</div>
					<div class="create-news__title__input">
						<label>Tag 1 EN:</label><br/>
						<input type="text" name="article_tag_1_en" wire:model.defer="article_tag_1_en" placeholder="Tag 1 in English">
					</div>
				</div>
				<div class="flex justify-around create-news__title">
					<div class="create-news__title__input">
						<label>Tag 2 FR:</label><br/>
						<input type="text" name="article_tag_2_fr" wire:model.defer="article_tag_2_fr" placeholder="Tag 2 in French">
					</div>
					<div class="create-news__title__input">
						<label>Tag 2 LU:</label><br/>
						<input type="text" name="article_tag_2_lu" wire:model.defer="article_tag_2_lu" placeholder="Tag 2 in Luxemburgish">
					</div>
					<div class="create-news__title__input">
						<label>Tag 2 DE:</label><br/>
						<input type="text" name="article_tag_2_de" wire:model.defer="article_tag_2_de" placeholder="Tag 2 in German">
					</div>
					<div class="create-news__title__input">
						<label>Tag 2 EN:</label><br/>
						<input type="text" name="article_tag_2_en" wire:model.defer="article_tag_2_en" placeholder="Tag 2 in English">
					</div>
				</div>
				<div class="flex justify-around create-news__title">
					<div class="create-news__title__input">
						<label>Tag 3 FR:</label><br/>
						<input type="text" name="article_tag_3_fr" wire:model.defer="article_tag_3_fr" placeholder="Tag 3 in French">
					</div>
					<div class="create-news__title__input">
						<label>Tag 3 LU:</label><br/>
						<input type="text" name="article_tag_3_lu" wire:model.defer="article_tag_3_lu" placeholder="Tag 3 in Luxemburgish">
					</div>
					<div class="create-news__title__input">
						<label>Tag 3 DE:</label><br/>
						<input type="text" name="article_tag_3_de" wire:model.defer="article_tag_3_de" placeholder="Tag 3 in German">
					</div>
					<div class="create-news__title__input">
						<label>Tag 3 EN:</label><br/>
						<input type="text" name="article_tag_3_en" wire:model.defer="article_tag_3_en" placeholder="Tag 3 in English">
					</div>
				</div>
			</section>

			<h2>
				News summary (displayed in all news list)
			</h2>
			<section class="flex justify-around create-news__title">
				<div class="create-news__title__input">
					<label>FR:</label><br/>
					<textarea name="article_summary_fr" wire:model.defer="article_summary_fr" placeholder="Summary in French" maxlength="190" required></textarea> 
				</div>
				<div class="create-news__title__input">
					<label>LU:</label><br/>
					<textarea name="article_summary_lu" wire:model.defer="article_summary_lu" placeholder="Summary in Luxemburgish" maxlength="190" required></textarea> 
				</div>
				<div class="create-news__title__input">
					<label>DE:</label><br/>
					<textarea name="article_summary_de" wire:model.defer="article_summary_de" placeholder="Summary in German" maxlength="190" required></textarea> 
				</div>
				<div class="create-news__title__input">
					<label>EN:</label><br/>
					<textarea name="article_summary_en" wire:model.defer="article_summary_en" placeholder="Summary in English" maxlength="190" required></textarea> 
				</div>
			</section>

			<h2>
				News SEO title (title appearing in Google results)
			</h2>
			<section class="flex justify-around create-news__title">
				<div class="create-news__title__input">
					<label>FR:</label><br/>
					<input type="text" name="article_seo_title_fr" wire:model.defer="article_seo_title_fr" placeholder="SEO title in French" maxlength="70" required>
				</div>
				<div class="create-news__title__input">
					<label>LU:</label><br/>
					<input type="text" name="article_seo_title_lu" wire:model.defer="article_seo_title_lu" placeholder="SEO title in Luxemburgish" maxlength="70" required>
				</div>
				<div class="create-news__title__input">
					<label>DE:</label><br/>
					<input type="text" name="article_seo_title_de" wire:model.defer="article_seo_title_de" placeholder="SEO title in German" maxlength="70" required>
				</div>
				<div class="create-news__title__input">
					<label>EN:</label><br/>
					<input type="text" name="article_seo_title_en" wire:model.defer="article_seo_title_en" placeholder="SEO title in English" maxlength="70" required>
				</div>
			</section>

			<h2>
				News SEO description (description appearing in Google results)
			</h2>
			<section class="flex justify-around create-news__title">
				<div class="create-news__title__input">
					<label>FR:</label><br/>
					<textarea name="article_seo_desc_fr" wire:model.defer="article_seo_desc_fr" placeholder="SEO desc in French" required></textarea> 
				</div>
				<div class="create-news__title__input">
					<label>LU:</label><br/>
					<textarea name="article_seo_desc_lu" wire:model.defer="article_seo_desc_lu" placeholder="SEO desc in Luxemburgish" required></textarea> 
				</div>
				<div class="create-news__title__input">
					<label>DE:</label><br/>
					<textarea name="article_seo_desc_de" wire:model.defer="article_seo_desc_de" placeholder="SEO desc in German" required></textarea> 
				</div>
				<div class="create-news__title__input">
					<label>EN:</label><br/>
					<textarea name="article_seo_desc_en" wire:model.defer="article_seo_desc_en" placeholder="SEO desc in English" required></textarea> 
				</div>
			</section>

			<h2>News main photo</h2>
			<input type="file" wire:model="main_photo" class="new-photo-form__file-input">
		    <div wire:loading wire:target="main_photo">Uploading...</div>

		    @error('main_photo') <span class="error">{{ $message }}</span> @enderror
		    @if(is_string($main_photo) && $main_photo !== "")
		    	<h4>Photo Preview:</h4>
		        <div class="flex justify-start new-photo-form__img-gallery">
			        <div class="new-photo-form__img-gallery__img-container">
			        	<img src="{{ asset('images/pictures/news/'.$main_photo) }}">
			        </div>
			    </div>
		    @elseif($main_photo !== null && $main_photo->temporaryUrl() !== null)
		        <h4>Photo Preview:</h4>
		        <div class="flex justify-start new-photo-form__img-gallery">
			        <div class="new-photo-form__img-gallery__img-container">
			        	<img src="{{ $main_photo->temporaryUrl() }}">
			        </div>
			    </div>
		    @endif


		    @if($show_article_content)
			<h1 wire:click="toggleArticleContent(0)">Article Content <span class="text-2xl"><strong>-</strong></span></h1>
			<div style="padding-left: 5px; margin-bottom: 40px;">
			@else
			<h1 wire:click="toggleArticleContent(1)" style="margin-bottom: 20px;">Article Content <span class="text-2xl"><strong>+</strong></span></h1>
			<div style="display: none;">
			@endif
				<h2>
					To be completed with article content
				</h2>
			</div>


			<div class="text-center" style="margin: 20px;">
				<button>
					Create News
				</button>
			</div>
		</form>
	</div>
</x-filament::page>
