@extends('layouts.emails_layout')

@section('email-title')
{{ trans('emails.newsletter-cancellation-title', [], $locale) }}
@endsection

@section('email-content')
    <p>
        <strong>{{ trans('emails.newsletter-cancellation-hello', [], $locale) }} {{ ucfirst($user->first_name) }},</strong>
    </p>
    <p>
        {{ trans('emails.newsletter-cancellation-txt-1', [], $locale) }}
    </p>
    <p>
        {{ trans('emails.newsletter-cancellation-info-1', [], $locale) }}
    </p>

    <p>
        {{ trans('emails.newsletter-cancellation-regards', [], $locale) }}
    </p>
    <p>
        <em><strong>{{ trans('emails.newsletter-cancellation-signature', [], $locale) }}</strong></em>
    </p>
@endsection