<div class="mask-sidebar flex justify-right">
    <div class="article-sidebar__img-container">
        <div style="height: 100%;">
        @foreach($pictures as $picture)
            <img src="{{ asset('images/pictures/articles/'.$picture) }}" alt="Photo {{ $creation_name }}" class="w-full">
        @endforeach
        </div>
        @if(count($pictures) > 1)
        <div class="article-sidebar__img-container__scroller flex justify-between">
            <p>{{ __('sidebar.see-pictures') }}</p>
            <p>
                @svg('model_arrow_down')
            </p>
        </div>
        @endif
    </div>

    <div class="article-sidebar__content">
        <div class="article-sidebar__content__close-container" wire:click="closeMaskSideBar">
            <div class="article-sidebar__content__close">
                {{ __('sidebar.close') }} <span class="pl-2">&#10005;</span>
            </div>
        </div>

        <h3 class="article-sidebar__content__subtitle mb-10">
            {{ __('sidebar.mask-subtitle') }}
        </h3>
        <div class="article-sidebar__content__size">
            @if($age == 'kid')
            {{ strtoupper(__('models.masks-kid')) }}
            @else
            {{ strtoupper(__('models.masks-adult')) }}
            @endif
        </div>

        <h2 class="article-sidebar__content__title">
            {{ __('models.masks') }} {{ ucfirst(strtolower($creation_name)) }}
        </h2>

        <p class="article-sidebar__content__price">
            {{ $creation_price }}&euro;
        </p>

        <p class="article-sidebar__content__singularity">
            <span class="primary-color">{!! __('sidebar.singularity') !!}</span> {{ __('sidebar.mask-singularity') }}
        </p>

        <h4 class="article-sidebar__content__mask-subtitle">
            {{ __('models.masks-options') }}
        </h4>

        <form method="POST" wire:submit.prevent="submitMasksRequest">
            @csrf
            @if($age == 'kid')
                <div class="flex justify-between article-sidebar__content__radio-option">
                    <input type="radio" id="mask_size_option_small" name="mask_size_option" value="small" wire:model="size" checked>
                    <label for="mask_size_option_small">{{ __('sidebar.mask-small-size') }}</label><br>
                    <input type="radio" id="mask_size_option_large" name="mask_size_option" value="large" wire:model="size">
                    <label for="mask_size_option_large">{{ __('sidebar.mask-large-size') }}</label><br>
                </div>
            @else
                <div class="flex justify-between article-sidebar__content__radio-option">
                    <input type="radio" id="mask_filter_option" name="mask_filter_option" value="1" checked wire:model="with_filter">
                    <label for="mask_filter_option">{{ __('sidebar.mask-with-filter') }}</label><br>
                    <input type="radio" id="mask_no_filter_option" name="mask_filter_option" value="0" wire:model="with_filter">
                    <label for="mask_no_filter_option">{{ __('sidebar.mask-without-filter') }}</label><br>
                </div>
                <div class="flex justify-between article-sidebar__content__radio-option mb-5">
                    <input type="radio" id="mask_elastic_option" name="mask_cord_option" value="0" checked wire:model="with_cotton">
                    <label for="mask_elastic_option">{{ __('sidebar.mask-elastic-option') }}</label><br>
                    <input type="radio" id="mask_cotton_option" name="mask_cord_option" value="1" wire:model="with_cotton">
                    <label for="mask_cotton_option">{{ __('sidebar.mask-cotton-option') }}</label><br>
                </div>
            @endif

            <div class="flex justify-start mt-10 mb-5">
                <h4 class="article-sidebar__content__mask-subtitle">
                    {{ __('models.masks-quantity') }}:
                </h4>
                <p class="article-sidebar__content__mask-number ml-5">
                    x {{ $masks_number }}
                </p>
                <div class="ml-5">
                    <p class="article-sidebar__content__mask-btn" wire:click.prevent.stop="updateMasksNumber('up')">
                        <i class="fas fa-plus"></i>
                    </p>
                    <p class="article-sidebar__content__mask-btn" wire:click.prevent.stop="updateMasksNumber('down')">
                        <i class="fas fa-minus"></i>
                    </p>
                </div>
                <input type="hidden" name="mask_number" wire:model="masks_number">
            </div>

            <h4 class="article-sidebar__content__mask-subtitle">
                {{ __('sidebar.masks-demand') }}:
            </h4>
            <textarea minlength="5" maxlength="1000" rows="4" name="mask_text_request" class="w-full article-sidebar__content__mask-textarea" wire:model="text_demand"></textarea>

            <h4 class="article-sidebar__content__mask-subtitle mt-8">
                * {{ __('sidebar.masks-email') }}:
            </h4>
            @auth
            <input type="email" name="mask_email" value="{{ Auth::user()->email }}" class="article-sidebar__content__mask-email" wire:model="email">
            @else
            <input type="email" name="mask_email" class="article-sidebar__content__mask-email" wire:model="email">
            @endauth

            <div class="mt-8 article-sidebar__content__mask-photos">
                <label for="mask_photos" class="inline-flex items-center">
                    <input id="mask_photos" type="checkbox" class="rounded border-gray-300 text-red-600 shadow-sm" name="mask_photos" wire:model="with_pictures">
                    <span class="ml-6">{{ __('sidebar.masks-photos') }}</span>
                </label>
            </div>

            <div class="mt-8">
                @if($status == 'pending' && ($email == null || strpos($email, '@') == false))
                <div class="btn-couture-plain btn-couture-plain--dark-hover w-full pt-2" style="height: 50px; margin: 0; background: grey; border-color: grey;">
                    {{ __('sidebar.masks-send-request') }}
                </div>
                @elseif($status == 'pending' && strpos($email, '@') !== false)
                <button type="submit" class="btn-couture-plain btn-couture-plain--dark-hover w-full" style="height: 50px; margin: 0;">
                    {{ __('sidebar.masks-send-request') }}
                </button>
                @elseif($status == 'sent')
                <div class="p-4 bg-green-100 text-green-600">
                    {!! __('sidebar.mask-sent-confirm') !!}
                </div>
                @endif
            </div>

            <p class="article-sidebar__content__contact mt-6 mb-10">
                {!! __('sidebar.questions') !!} <a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-contact')]) }}" target="_blank" class="primary-color">{{ __('sidebar.contact-us') }}</a>
            </p>
        </form>
    </div>
</div>
