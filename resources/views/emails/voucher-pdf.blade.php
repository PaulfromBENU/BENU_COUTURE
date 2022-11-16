@extends('layouts.emails_layout')

@section('email-title')
	{{ trans('emails.pdf-voucher-title', [], $locale) }}
@endsection

@section('email-content')
	<p>
		<strong>{{ trans('emails.pdf-voucher-hello', [], $locale) }} {{ ucfirst($buyer->first_name) }},</strong>
	</p>
	<p>
		{{ trans('emails.pdf-voucher-txt-1', [], $locale) }}
	</p>
	<p>
		{{ trans('emails.pdf-voucher-txt-2', [], $locale) }} <a href="{{ route('client-service-'.app()->getLocale(), ['page' => trans('slugs.services-shops', [], $locale)]) }}" style="color: #27955B;">{{ trans('emails.pdf-voucher-txt-3', [], $locale) }}</a> {{ trans('emails.pdf-voucher-txt-4', [], $locale) }}
	</p>
	
	@if($buyer->role == 'guest_client')
		<p>
			{{ trans('emails.pdf-voucher-no-account-1', [], $locale) }} <a href="{{ route('register-'.$locale) }}" style="color: #27955B;">{{ trans('emails.pdf-voucher-no-account-link', [], $locale) }}</a> {{ trans('emails.pdf-voucher-no-account-2', [], $locale) }}
		</p>
	@else
		<p>
			{{ trans('emails.pdf-voucher-with-account-1', [], $locale) }} <a href="{{ route('dashboard', ['locale' => $locale]) }}" style="color: #27955B;">{{ trans('emails.pdf-voucher-with-account-link', [], $locale) }}</a> {{ trans('emails.pdf-voucher-with-account-2', [], $locale) }}
		</p>
	@endif

	<p>
		{{ trans('emails.pdf-voucher-txt-5', [], $locale) }} <a href="{{ route('footer.policy-'.$locale) }}" style="color: #27955B;">{{ trans('emails.pdf-voucher-txt-6', [], $locale) }}</a>.
	</p>

	<p>
		{{ trans('emails.pdf-voucher-txt-7', [], $locale) }} <a href="mailto:info@benucouture.lu" style="color: #27955B;">info@benucouture.lu</a> {{ trans('emails.pdf-voucher-txt-8', [], $locale) }} <a href="{{ route('client-service-'.$locale, ['page' => __('slugs.services-contact')]) }}" style="color: #27955B;">{{ trans('emails.pdf-voucher-txt-9', [], $locale) }}</a> {{ trans('emails.pdf-voucher-txt-10', [], $locale) }}
	</p>

	<p>
		{{ trans('emails.pdf-voucher-txt-11', [], $locale) }}
	</p>
	<p>
		<em><strong>{{ trans('emails.pdf-voucher-signature', [], $locale) }}</strong></em>
	</p>
@endsection