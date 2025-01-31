<section class="benu-container welcome-presentation">
    <div class="welcome-presentation__illustration">
        <img src="{{ asset('images/pictures/couture_illustrations_pattern_slide1_v1.jpg') }}" class="welcome-illustration-1 welcome-presentation__img">
        <img src="{{ asset('images/pictures/couture_illustrations_pattern_slide2_v1.jpg') }}" class="welcome-illustration-2 welcome-presentation__img">
        <img src="{{ asset('images/pictures/couture_illustrations_pattern_slide3_v1.jpg') }}" class="welcome-illustration-3 welcome-presentation__img">
        <img src="{{ asset('images/pictures/couture_illustrations_pattern_slide4_v1.jpg') }}" class="welcome-illustration-4 welcome-presentation__img">
        <img src="{{ asset('images/pictures/couture_illustrations_pattern_slide5_v1.jpg') }}" class="welcome-illustration-5 welcome-presentation__img">
    </div>
    <div class="welcome-presentation__desc">
        <div class="flex justify-start welcome-presentation__desc__bar">
            <button class="welcome-presentation__desc__bar__btn --active welcome-illustration-btn-1">{{ __('welcome.bar-title-1') }}</button>
            <button class="welcome-presentation__desc__bar__btn welcome-illustration-btn-2">{{ __('welcome.bar-title-2') }}</button>
            <button class="welcome-presentation__desc__bar__btn welcome-illustration-btn-3">{{ __('welcome.bar-title-3') }}</button>
            <button class="welcome-presentation__desc__bar__btn welcome-illustration-btn-4">{{ __('welcome.bar-title-4') }}</button>
            <button class="welcome-presentation__desc__bar__btn welcome-illustration-btn-5">{{ __('welcome.bar-title-5') }}</button>
        </div>
        <div>
            <h3 class="welcome-presentation__desc__title welcome-illustration-1">
                <!-- <span class="primary-color">{{ __('welcome.pres-title-1-1') }}</span> -->{{ __('welcome.pres-title-1-1') }}
            </h3>
            <h3 class="welcome-presentation__desc__title welcome-illustration-2">
                <!-- <span class="primary-color">{{ __('welcome.pres-title-2-1') }}</span>  -->{{ __('welcome.pres-title-2-1') }}
            </h3>
            <h3 class="welcome-presentation__desc__title welcome-illustration-3">
                <!-- <span class="primary-color">{{ __('welcome.pres-title-3-1') }}</span>  -->{{ __('welcome.pres-title-3-1') }}
            </h3>
            <h3 class="welcome-presentation__desc__title welcome-illustration-4">
                <!-- <span class="primary-color">{{ __('welcome.pres-title-4-1') }}</span>  -->{{ __('welcome.pres-title-4-1') }}
            </h3>
            <h3 class="welcome-presentation__desc__title welcome-illustration-5">
                <!-- <span class="primary-color">{{ __('welcome.pres-title-5-1') }}</span>  -->{{ __('welcome.pres-title-5-1') }}
            </h3>
        </div>

        <div class="">
            <div class="welcome-illustration-1 welcome-presentation__desc__text">
                {!! __('welcome.pres-txt-1') !!}
            </div>
            <p class="welcome-illustration-2 welcome-presentation__desc__text">
                {!! __('welcome.pres-txt-2') !!}
            </p>
            <p class="welcome-illustration-3 welcome-presentation__desc__text">
                {!! __('welcome.pres-txt-3') !!}
            </p>
            <p class="welcome-illustration-4 welcome-presentation__desc__text">
                {!! __('welcome.pres-txt-4') !!}
            </p>
            <ul class="welcome-illustration-5 welcome-presentation__desc__text" id="welcome-bullet-presentation">
                <li>{!! __('welcome.pres-txt-5') !!}</li>
            </ul>
        </div>
        <div class="">
            <a href="{{ route('about-'.app()->getLocale()) }}" class="welcome-illustration-1 welcome-presentation__desc__link">{!! __('welcome.pres-link-1') !!}</a>
            <a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-shops')]) }}" class="welcome-illustration-2 welcome-presentation__desc__link">{!! __('welcome.pres-link-2') !!}</a>
            <a href="{{ route('about-'.app()->getLocale()) }}" class="welcome-illustration-3 welcome-presentation__desc__link">{!! __('welcome.pres-link-3') !!}</a>
            <a href="{{ route('footer.general-info-'.app()->getLocale()) }}" class="welcome-illustration-4 welcome-presentation__desc__link">{!! __('welcome.pres-link-4') !!}</a>
            <a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-faq')]) }}" class="welcome-illustration-5 welcome-presentation__desc__link">{!! __('welcome.pres-link-5') !!}</a>
        </div>
    </div>
</section>