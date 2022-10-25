@extends('layouts.html_general_layout')

@section('main-content-top')
<div class="qr-code flex justify-start flex-wrap">
    @for($i = 1; $i <= $number; $i ++)
    <div class="visible-print text-center qr-code__code">
        {!! QrCode::size(100)->generate(route('model-fr', ['name' => $creation_name])); !!}
        <p class="text-center primary-color">{{ strtoupper($creation_name) }}</p>
    </div>
    @endfor
</div>
@endsection