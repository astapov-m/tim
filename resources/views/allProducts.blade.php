@extends('layouts.master')
@section('css')
    <link href="/css/card.css" rel="stylesheet">
@endsection
@section('content')
    <h1 align="center">Все товары</h1>

    <div class="row">
        @foreach($products as $product)
            @include('layouts.card',compact($product))
        @endforeach
    </div>


@endsection

