<x-filament::page>
	<section class="new-orders">
		<h2>
			New orders - Already paid - To be prepared for delivery or collect in shop
		</h2>
		@if($new_orders->count() == 0)
		<p>
			<em>No new order for the moment...</em>
		</p>
		@endif
		@foreach($new_orders as $new_order)
		<div class="new-orders__order relative" wire:key="new-{{ $new_order->id }}">
			<div class="new-orders__order__confirm-ready flex">
				@if($new_order->address_id == 0)
					<button wire:click="markAsReadyForCollect({{ $new_order->id }})">	
						Mark as 'Ready for collect'
					</button>
				@else
					<div>
						<label>Delivery follow-up link:</label><br/>
						<input type="text" name="delivery_link" wire:model="delivery_link.{{ $new_order->id }}" placeholder="https://...">
					</div>
					<div>
						<button wire:click="markAsSentByPost({{ $new_order->id }})" style="margin-top: 23px;">
							Mark as 'Sent to customer'
						</button>
					</div>
				@endif
			</div>

			<div class="text-3xl font-medium">
				Order #{{ $new_order->unique_id }}
			</div>
			<p class="text-xl">
				Total: {{ $new_order->total_price }}&euro; - Paid on {{ $new_order->created_at->format('d\/m\/Y') }} - 
				<button wire:click="markAsUnpaid({{ $new_order->id }})" class="new-orders__btn-1">Mark as unpaid</button>
			</p>

			<div class="text-lg" style="margin-top: 30px; border-left: solid 1px lightgrey; padding-left: 10px;">
				@if($new_order->address_id == 0)
					<p style="color: rgb(234 179 8);">Retrait en magasin</p>
				@else
					<p style="color: rgb(234 179 8);">Delivery address:</p>
					<p class="uppercase">
						{{ $new_order->address->first_name }} {{ $new_order->address->last_name }}
					</p>
					<p>
						{{ $new_order->address->street_number }}, {{ $new_order->address->street }}
					</p>
					@if($new_order->address->floor !== null && $new_order->address->floor !== "")
					<p>
						{{ $new_order->address->floor }}
					</p>
					@endif
					<p>
						{{ $new_order->address->zip }} {{ $new_order->address->city }}, {{ $new_order->address->country }}
					</p>
					@if($new_order->address->other_infos !== null && $new_order->address->other_infos !== "")
					<p>
						Other info: {{ $new_order->address->other_infos }}
					</p>
					@endif
				@endif
			</div>

			<div class="text-lg" style="margin-top: 30px;">
				<p style="color: rgb(234 179 8);">Articles in order:</p>
				@foreach($new_order->cart->couture_variations as $article)
					<div class="flex justify-start flex-wrap new-orders__order__article" wire:key="new-article-{{ $article->id }}">
						<div class="new-orders__order__article__img-container">
							@if($article->name == 'voucher')
					        <img src="{{ asset('images/pictures/vouchers_img.png') }}" alt="BENU vouchers" title="BENU Vouchers" />
					        @elseif($article->photos()->where('is_front', '1')->count() > 0)
					        <img src="{{ asset('images/pictures/articles/'.$article->photos()->where('is_front', '1')->first()->file_name) }}">
					        @else
					        <img src="{{ asset('images/pictures/articles/'.$article->photos()->first()->file_name) }}">
					        @endif
						</div>

						<div style="margin-left: 30px; width: 30%;">
							@if($article->name == 'voucher')
								<h4 class="text-xl font-bold">
									<strong>VOUCHER</strong>
								</h4>
								<p>
									Type: @if($article->voucher_type == 'pdf') PDF @else Clothe @endif
								</p>
								<p>
									Value: <strong class="text-xl">{{ $article->pivot->value }}&euro;</strong>
								</p>
								<p>
									Number of items: <strong class="text-xl">x{{ $article->pivot->articles_number }}</strong>
								</p>
								@if($article->voucher_type == 'pdf')
									<p class="text-green-200" style="color: lightgreen;">
										ALREADY SENT BY EMAIL<br/>NO ACTION REQUIRED
									</p>
								@endif
							@else
								<h4 class="text-xl font-bold">
									<strong>{{ strtoupper($article->name) }}</strong>
								</h4>
								<p>
									Price: <strong class="text-xl">{{ $article->creation->price }}&euro;</strong>
								</p>
								<p>
									Color: <strong class="text-xl">{{ $article->color->name }}</strong>
								</p>
								<p>
									Number of items: <strong class="text-xl">x{{ $article->pivot->articles_number }}</strong>
								</p>
							@endif
						</div>

						<div style="margin-left: 40px; max-width: 40%;">
							@if($article->name == 'voucher')
								<p>
									Codes:
									@if($article->voucher_type == 'pdf')
									<ul>
										@foreach($new_order->pdf_vouchers as $pdf_voucher)
										<li wire:key="new-article-pdf-voucher-{{ $pdf_voucher->id }}" style="padding-left: 5px;">
											> <strong class="text-xl">{{ strtoupper($pdf_voucher->unique_code) }}</strong>
										</li>
										@endforeach
									</ul>
									@else
									<ul>
										@foreach($new_order->clothe_vouchers as $clothe_voucher)
										<li wire:key="new-article-clothe-voucher-{{ $clothe_voucher->id }}" style="padding-left: 5px;">
											> <strong class="text-xl">{{ strtoupper($clothe_voucher->unique_code) }}</strong>
										</li>
										@endforeach
									</ul>
									@endif
								</p>
							@else
								@if($article->pivot->is_gift)
									<p class="text-xl font-bold">
										Article is a gift!
									</p>
									@if($article->pivot->with_wrapping)
									<p>
										> Gift wrapping requested
									</p>
									@endif
									@if($article->pivot->with_card)
									<div>
										<p>
											> Gift card requested, with the following card:
										</p>
										<p class="text-center" style="margin-top: 5px; margin-bottom: 5px;">
											<img src="{{ asset('images/pictures/gift_card_'.$article->pivot->card_type.'.png') }}" style="height: 120px; margin: auto;" />
										</p>
									</div>
									@endif
									@if($article->pivot->message !== "" && $article->pivot->message !== null)
									<p>
										With the following message:
									</p>
									<p>
										<em>
											{{ $article->pivot->message }}
										</em>
									</p>
									@endif
								@endif
							@endif
						</div>
					</div>
				@endforeach
			</div>
		</div>
		@endforeach
	</section>


	<section class="new-orders">
		<h2 style="padding-top: 50px;">
			Unpaid orders - Waiting for payment - Bank account to be verified for payment confirmation
		</h2>
		@if($orders_waiting_for_payment->count() == 0)
		<p>
			<em>No unpaid order for the moment...</em>
		</p>
		@endif
		@foreach($orders_waiting_for_payment as $unpaid_order)
		<div class="new-orders__order relative" wire:key="unpaid-{{ $unpaid_order->id }}">
			<div class="new-orders__order__confirm-ready flex">
					<div>
						<button wire:click="markAsPaid({{ $unpaid_order->id }})" style="margin-top: 23px;">
							Mark as 'Paid'
						</button>
					</div>
			</div>

			<div class="text-3xl font-medium">
				Order #{{ $unpaid_order->unique_id }}
			</div>
			<p class="text-xl">
				Total: {{ $unpaid_order->total_price }}&euro; - Not paid - Created on {{ $unpaid_order->created_at->format('d\/m\/Y') }}
			</p>
			<p class="text-xl font-medium">
				Expected bank transfer reference: "BENU{{ $unpaid_order->unique_id }}"
			</p>
		</div>
		@endforeach
	</section>


	<section class="new-orders">
		<h2 style="padding-top: 50px;">
			Sent/collected orders
		</h2>
		@if($orders_waiting_for_payment->count() == 0)
		<p>
			<em>No sent or collected orders for the moment...</em>
		</p>
		@endif
		@foreach($orders_sent as $sent_order)
		<div class="new-orders__order relative" wire:key="unpaid-{{ $sent_order->id }}">
			<div class="new-orders__order__confirm-ready flex">
					<div>
						<button wire:click="markAsUndelivered({{ $sent_order->id }})" style="margin-top: 23px;">
							Mark as 'Undelivered'
						</button>
					</div>
			</div>

			<div class="text-3xl font-medium">
				Order #{{ $sent_order->unique_id }}
			</div>
			<p class="text-xl">
				Total: {{ $sent_order->total_price }}&euro; - Paid - Sent/Ready for collect on {{ $sent_order->delivery_date }}
			</p>
		</div>
		@endforeach
	</section>
</x-filament::page>
