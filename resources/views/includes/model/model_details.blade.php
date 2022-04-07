<section class="flex justify-between model-pres benu-container">
	<div class="model-pres__img-container">
		@foreach($model_pictures as $picture)
            <img src="{{ asset('images/pictures/articles/'.$picture) }}" @if($loop->index > 0) style="display: none;" @endif>
        @endforeach
        @if($model_pictures->count() > 1)
            <div class="slider-arrow slider-arrow--color-2 slider-arrow--left article-arrow-left">
                <i class="fas fa-chevron-left"></i>
            </div>
            <div class="slider-arrow slider-arrow--color-2 slider-arrow--right article-arrow-right">
                <i class="fas fa-chevron-right"></i>
            </div>
        @endif
	</div>
	<div class="model-pres__desc">
		@if($model->product_type == 0)
			<h1 class="model-pres__desc__title">{{ __('models.model') }} {{ strtoupper($model->name) }}</h1>
		@elseif($model->product_type == 1)
		<!-- Case mask for kids -->
			<div class="flex justify-start">
				<h1 class="model-pres__desc__title">{{ __('models.masks') }} {{ strtoupper($model->name) }}</h1>
				<div class="model-pres__desc__age ml-5">
					{{ strtoupper(__('models.masks-kid')) }}
				</div>
			</div>
		@elseif($model->product_type == 2)
		<!-- Case mask for adults -->
			<div class="flex justify-start">
				<h1 class="model-pres__desc__title">{{ __('models.masks') }} {{ strtoupper($model->name) }}</h1>
				<div class="model-pres__desc__age ml-5">
					{{ strtoupper(__('models.masks-adult')) }}
				</div>
			</div>
		@elseif($model->product_type == 3)
		<!-- Case small item -->
			<div class="flex justify-start">
				<h1 class="model-pres__desc__title">{{ __('models.masks') }} {{ strtoupper($model->name) }}</h1>
				<div class="model-pres__desc__age ml-5">
					{{ strtoupper(__('models.is-small-item')) }}
				</div>
			</div>
		@else
		<!-- All other cases -->
			<h1 class="model-pres__desc__title">{{ __('models.model') }} {{ strtoupper($model->name) }}</h1>
		@endif
		
		<p class="model-pres__desc__txt">
			{{ $localized_description }}
		</p>
		<div class="flex justify-start model-pres__desc__keywords">
			<ul>
				@for($i = 0; $i < 4; $i++)
					@if(isset($keywords[$i]))
					<li>@svg('list_cintre') {{ $keywords[$i] }}</li>
					@endif
				@endfor
			</ul>
			
			@if(sizeof($keywords) > 4)
			<ul>
				@for($i = 4; $i < 8; $i++)
					@if(isset($keywords[$i]))
					<li>@svg('list_cintre') {{ $keywords[$i] }}</li>
					@endif
				@endfor
			</ul>
			@endif
		</div>

		@if($model->product_type == 1 || $model->product_type == 2)
		<div class="model-pres__desc__link">
			<button id="mask-specific-order-btn" class="btn-couture-plain btn-couture-plain--dark-hover mb-5" style="height: 45px; margin-left: 0;">
				{{ __('models.model-specific-order-btn') }}
			</button>
		</div>
		@elseif($model->product_type == 3)
		<div class="model-pres__desc__link">
			<button id="items-specific-order-btn" class="btn-couture-plain btn-couture-plain--dark-hover mb-5" style="height: 45px; margin-left: 0;">
				{{ __('models.items-specific-order-btn') }}
			</button>
		</div>
		@endif

		<div>
			<p class="model-pres__desc__txt" style="margin-bottom: 10px;">
				{!! __('models.link-explanation') !!}
			</p>
			<p class="model-pres__desc__link">
				@php $link_query = "origin_link_".app()->getLocale(); @endphp
				<a href="{{ $model->$link_query }}" target="_blank" class="btn-slider-left">{{ __('models.model-origins') }} {{ strtoupper($model->name) }}</a>
			</p>
		</div>

		@if($model->product_type != 3)
			<div class="flex model-pres__desc__seemore">
				<a onclick='document.getElementById("model-articles").scrollIntoView({ behavior: "smooth", block: "start" });' class="flex">
					{{ __('models.model-link-articles') }} @svg('model_arrow_down')
				</a>
				
					<a class="flex">
						{{ __('models.model-link-accessories') }} @svg('model_arrow_down')
					</a>
				
			</div>
		@endif
	</div>
</section>