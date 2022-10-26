@extends('layouts.html_general_layout')

@section('main-content-top')
<div class="qr-code flex justify-start flex-wrap">
    @for($i = 1; $i <= $number; $i ++)
    <div class="visible-print text-center qr-code__code">
        {!! QrCode::size(100)->generate(route('model-fr', ['name' => $creation_name])); !!}
        <p class="text-center primary-color qr-code__code__name">{{ strtoupper($creation_name) }}</p>
        <p class="text-center primary-color qr-code__code__price">{{ $price }}&euro;</p>
        <!-- format('png')->merge('/public/images/favicon/apple-icon-60x60.png')-> -->
    </div>
    @endfor
</div>
@endsection