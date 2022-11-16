@extends('layouts.emails_layout')

@section('email-title')
	{{ trans('emails.message-answer-title', [], $locale) }}
@endsection

@section('email-content')
	<p>
		<strong>{{ trans('emails.message-answer-hello', [], $locale) }} {{ ucfirst($user->first_name) }},</strong>
	</p>
	<p>
		{{ trans('emails.message-answer-txt-1', [], $locale) }}
	</p>
	<p>
		{{ trans('emails.message-answer-txt-2', [], $locale) }}
	</p>

	<p style="margin-top: 10px;">
		{{ trans('emails.message-answer-conclusion-1', [], $locale) }}
	</p>
	<p>
		<em><strong>{{ trans('emails.message-answer-signature', [], $locale) }}</strong></em>
	</p>
@endsection