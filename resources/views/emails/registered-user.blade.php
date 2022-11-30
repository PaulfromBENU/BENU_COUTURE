@extends('layouts.emails_layout')

@section('email-title')
	{{ trans('emails.register-welcome-to-benu', [], $locale) }}
@endsection

@section('email-content')
	<p>
		<strong>{{ trans('emails.register-hello', [], $locale) }} {{ ucfirst($user->first_name) }},</strong>
	</p>
	<p>
		{{ trans('emails.register-txt-1', [], $locale) }}
	</p>
	<p style="text-align: center; color: #27955B;">
		<strong>{{ $user->email }}</strong>
	</p>
	<p>
		{{ trans('emails.register-txt-2', [], $locale) }} <a href="{{ route('dashboard', ['locale' => $locale]) }}" style="color: #27955B;">{{ __('emails.register-dashboard') }}</a> {{ trans('emails.register-txt-3', [], $locale) }}
	</p>
	<p>
		{{ trans('emails.register-txt-4', [], $locale) }} <a href="mailto:info@benucouture.lu" style="color: #27955B;">info@benucouture.lu</a> {{ trans('emails.register-txt-5', [], $locale) }} <a href="{{ route('client-service-'.$locale, ['page' => __('slugs.services-contact')]) }}" style="color: #27955B;">{{ trans('emails.register-contact', [], $locale) }}</a>.
	</p>
	<p>
		{{ trans('emails.register-txt-6', [], $locale) }}
	</p>
	<p>
		<em><strong>{{ trans('emails.register-benu-team-signature', [], $locale) }}</strong></em>
	</p>
@endsection