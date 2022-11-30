@extends('layouts.emails_layout')

@section('email-title')
    {{ trans('emails.newsletter-confirmation-title', [], $locale) }}
@endsection

@section('email-content')
    <p>
        <strong>{{ trans('emails.newsletter-confirmation-hello', [], $locale) }} {{ ucfirst($user->first_name) }},</strong>
    </p>
    <p>
        {{ trans('emails.newsletter-confirmation-txt-1', [], $locale) }}
    </p>
    <p>
        {{ trans('emails.newsletter-confirmation-txt-2', [], $locale) }} <a href="mailto:benu@benu.lu" style="color: #27955B;">{{ trans('emails.newsletter-confirmation-txt-3', [], $locale) }}</a> {{ trans('emails.newsletter-confirmation-txt-4', [], $locale) }}
    </p>
    <p>
        {{ trans('emails.newsletter-confirmation-txt-5', [], $locale) }}
    </p>
    <p>
        {{ trans('emails.newsletter-confirmation-txt-6', [], $locale) }} <a href="mailto:benu@benu.lu" style="color: #27955B;">benu@benu.lu</a> {{ trans('emails.newsletter-confirmation-txt-8', [], $locale) }} <a href="{{ route('newsletter-stop-'.$locale, ['id' => rand(10, 99).rand(10, 99).rand(10, 99).$user->id]) }}" style="color: #27955B">{{ trans('emails.newsletter-confirmation-txt-9', [], $locale) }}</a>.
    </p>

    <p>
        {{ trans('emails.newsletter-confirmation-txt-10', [], $locale) }}
    </p>
    <p>
        {{ trans('emails.newsletter-confirmation-txt-11', [], $locale) }}
    </p>
    <p>
        <em><strong>{{ trans('emails.newsletter-confirmation-signature', [], $locale) }}</strong></em>
    </p>
@endsection