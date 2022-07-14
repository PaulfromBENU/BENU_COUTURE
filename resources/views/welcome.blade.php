@extends('layouts.base_layout')

@section('title')
    Bienvenue sur BENU COUTURE
@endsection

@section('main-content')
    @include('includes.welcome.presentation')
    @include('includes.welcome.campaign')
    @include('includes.welcome.last_creations')
    @include('includes.welcome.other_creations')
@endsection

@section('scripts')
<script type="text/javascript">
    $(function() {
        let bulletText = $('#welcome-bullet-presentation').text();
        let splitText = bulletText.split("•");
        let newText = "";
        let newSentence;
        splitText.forEach(function(sentence, index) {
            if (index > 0 && index) {
                // newSentence = "• " + sentence + '</li><li>';
                if (index == splitText.length - 1) {
                    newSentence = " " + sentence;
                } else {
                    newSentence = " " + sentence + '</li><li>';
                }
                newText += newSentence;
            }
        });
        $('#welcome-bullet-presentation').html(newText);
    });
</script>
@endsection
