@extends('layouts.master')
@section('title', 'Наша продукция')
@section('css')
    <link href="/css/card.css" rel="stylesheet">
@endsection
@section('content')
    <div class="row">
        @include('layouts.cardCategories',compact($categories))
    </div>
@endsection
