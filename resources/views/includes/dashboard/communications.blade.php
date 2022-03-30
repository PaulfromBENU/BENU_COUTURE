<div class="dashboard-communications w-full">
    <h2>
        {!! __('dashboard.my-communications') !!}
    </h2>

    <ul class="faq__accordion">
		<li>
			<div class="faq__accordion__header flex justify-between">
				<p>{!! __('services.faq-group-title-'.$index) !!}</p>
				<p><img src="{{ asset('images/pictures/chevron_bottom_white.png') }}" class="faq__accordion__header__chevron"></p>
			</div>

			<div class="faq__accordion__answer" style="display: none;">
				<p class="faq__accordion__answer__txt">
					{!! __('services.faq-group-desc-'.$index) !!}
				</p>
				<ul class="mb-10">
					@for($sub_index = 1; $sub_index <= $faq_subtitles_count[$index]; $sub_index ++)
						<li>
							<div class="flex justify-between faq__accordion__answer__header">
								<p>{!! __('services.faq-group-'.$index.'-question-title-'.$sub_index) !!}</p>
								<p>
									<span class="faq__accordion__answer__header__plus">+</span>
									<span class="faq__accordion__answer__header__minus" style="display: none;">-</span>
								</p>
							</div>
							<p class="faq__accordion__answer__subanswer" style="display: none;">
								{!! __('services.faq-group-'.$index.'-question-content-'.$sub_index) !!}
							</p>
						</li>
					@endfor
				</ul>
			</div>
		</li>
	</ul>
</div>