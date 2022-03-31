<div class="dashboard-conditions">
	<h2>{{ __('dashboard.general-conditions') }}</h2>
	<div>
		<h3>{!! __('dashboard.general-conditions-updated-on') !!}: <span class="primary-color">{{ $general_conditions_date }}</span></h3>
		<p>
			{{ $general_conditions_content }}
		</p>
		@if(auth()->user()->last_conditions_agreed == '0')
			<div class="text-left mt-10">
				<button class="btn-couture-plain" style="padding-bottom: 7px; padding-top: 7px; height: fit-content;" wire:click="acceptNewConditions">
					{!! __('dashboard.accept-new-conditions') !!}
				</button>
			</div>
		@else
			<div class="primary-color mt-10">
				{!! __('dashboard.new-conditions-accepted') !!}
			</div>
		@endif
	</div>
</div>