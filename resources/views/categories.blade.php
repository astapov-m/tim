@extends('layouts.master')
@section('css')
    <link href="/css/card.css" rel="stylesheet">
@endsection
@section('content')
    <div class="row">
        @include('layouts.cardCategories',compact($categories))
    </div>
@endsection
