@extends('layouts.master')
@section('css')
    <link href="/css/card.css" rel="stylesheet">
@endsection
@section('content')
    <div class="news" id="tree"><a href="#" style="color: black">Категори</a></div>
    <div class="row" id="includedContent">
        @include('layouts.cardCategories',compact($categories))
    </div>
    <script>
        $('.news').on('click' ,function(e){
            e.preventDefault();
            location.reload();
        });
    </script>

@endsection
