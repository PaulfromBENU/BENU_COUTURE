@extends('layouts.emails_layout')

@section('email-title')
	{{ trans('emails.order-is-ready', [], $locale) }}
@endsection

@section('email-content')
	<p>
		<strong>{{ trans('emails.order-ready-hello', [], $locale) }} {{ ucfirst($user->first_name) }},</strong>
	</p>
	@if($order->address_id == 0)
		{{ trans('emails.order-ready-shop-1', [], $locale) }}
	@else
		{{ trans('emails.order-ready-delivery-1', [], $locale) }}
	@endif
	@if($user->role !== 'guest_client')
		<p>
			{{ trans('emails.order-ready-with-account-1', [], $locale) }} <a href="{{ route('dashboard', ['locale' => $locale]) }}" style="color: #27955B;">{{ trans('emails.order-ready-with-account-link', [], $locale) }}</a>.
		</p>
	@else
		<p>
			{{ trans('emails.order-ready-no-account-1', [], $locale) }} <a href="{{ route('register-'.$locale) }}" style="color: #27955B;">{{ trans('emails.order-ready-no-account-link', [], $locale) }}</a> {{ trans('emails.order-ready-no-account-2', [], $locale) }}
		</p>
	@endif

	<p style="text-align: center; color: #27955B;">
		{{ trans('emails.order-ready-txt-1', [], $locale) }} <strong>{{ $order->unique_id }}</strong>
	</p>

	@if($order->address_id == 0)
	<p>
		{{ trans('emails.order-ready-txt-collect-1', [], $locale) }} <a href="{{ route('client-service-'.$locale, ['page' => trans('slugs.services-shops', [], $locale)]) }}" style="color: #27955B;">{{ trans('emails.order-ready-txt-collect-2', [], $locale) }}</a> {{ trans('emails.order-ready-txt-collect-3', [], $locale) }}
	</p>
	<p>
		{{ trans('emails.order-ready-txt-collect-4', [], $locale) }}
	</p>
	@endif
	
	@if($order->address_id > 0 && $order->delivery_link !== null && $order->delivery_link !== "")
	<p>
		{{ trans('emails.order-ready-follow-delivery', [], $locale) }} <a href="https://www.post.lu/de/particuliers/colis-courrier/track-and-trace#/search" style="color: #27955B;">{{ trans('emails.order-ready-follow-delivery-link', [], $locale) }}</a>
	</p>
	<p>
		{{ trans('emails.order-ready-follow-up-number', [], $locale) }} {{ $order->delivery_link }}
	</p>
	@endif

	<p>
		{{ trans('emails.order-ready-contact-1', [], $locale) }} <a href="mailto:info@benucouture.lu" style="color: #27955B;">info@benucouture.lu</a> {{ trans('emails.order-ready-contact-2', [], $locale) }} <a href="{{ route('client-service-'.$locale, ['page' => __('slugs.services-contact')]) }}" style="color: #27955B;">{{ trans('emails.order-ready-contact-3', [], $locale) }}</a> {{ trans('emails.order-ready-contact-4', [], $locale) }}
	</p>

	<p>
		{{ trans('emails.order-ready-conclusion', [], $locale) }}
	</p>

	<p>
		<em><strong>{{ trans('emails.order-ready-signature', [], $locale) }}</strong></em>
	</p>
@endsection