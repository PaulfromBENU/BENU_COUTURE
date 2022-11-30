@extends('layouts.emails_layout')

@section('email-title')
	{{ trans('emails.new-conditions-title', [], $locale) }}
@endsection

@section('email-content')
	<p>
		<strong>{{ trans('emails.new-conditions-hello', [], $locale) }} {{ ucfirst($user->first_name) }},</strong>
	</p>
	<p>
		{{ trans('emails.new-conditions-txt-1', [], $locale) }}
	</p>
	<p>
		{{ trans('emails.new-conditions-txt-2', [], $locale) }}
	</p>
	<p>
		{{ trans('emails.new-conditions-txt-3', [], $locale) }} <a href="{{ route('dashboard', ['locale' => $locale]) }}" style="color: #27955B;">{{ trans('emails.new-conditions-txt-4', [], $locale) }}</a> {{ trans('emails.new-conditions-txt-5', [], $locale) }}
	</p>
	<p>
		{{ trans('emails.new-conditions-txt-6', [], $locale) }}
	</p>
	<p>
		{{ trans('emails.new-conditions-txt-7', [], $locale) }} <a href="mailto:info@benucouture.lu" style="color: #27955B;">info@benucouture.lu</a> {{ trans('emails.new-conditions-txt-8', [], $locale) }} <a href="{{ route('client-service-'.$locale, ['page' => __('slugs.services-contact')]) }}" style="color: #27955B;">{{ trans('emails.new-conditions-txt-9', [], $locale) }}</a> {{ trans('emails.new-conditions-txt-10', [], $locale) }}
	</p>
	<p>
		{{ trans('emails.new-conditions-txt-11', [], $locale) }}
	</p>
	<p>
		<em><strong>{{ trans('emails.new-conditions-signature', [], $locale) }}</strong></em>
	</p>
@endsection