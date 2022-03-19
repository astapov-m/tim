@extends('layouts.master')
@section('css')
    <link href="/css/card.css" rel="stylesheet">
@endsection
@section('content')
        <a href="{{route('categories')}}" style="float: left;color: black">Категории</a>
        @foreach($categoryList->getParents() as $category)
            <a href="{{route('category',[$category->code,$category->id])}}" style="float: left; color: black"> >> {{$category->name}}</a>
        @endforeach
        <p href="{{route('category',[$categoryList->code,$categoryList->id])}}" style="float: left;color: black"> >> {{$categoryList->name}}</p>
        <br>
        <br>
        <div class="row">
            @isset($categories)
                @include('layouts.cardCategories',compact($categories))
            @endisset
            @isset($cat)
                @include('layouts.cardCategories',compact($cat))
            @endisset
        </div>
@endsection
