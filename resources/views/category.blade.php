@extends('layouts.master')
@section('css')

    <link href="/css/card.css" rel="stylesheet">
@endsection
@section('content')
    <h1 align="center">{{$category->name}} </h1>

    <div class="product_details" style="margin-top: 25px">
        <div class="row details_row">
            <div class="col-lg-6">
                <div class="details_image">

                    <div class="details_image_large"><img src="{{Storage::url($category->image)}}" width="80%" style="border-radius: 5px" alt="..."></div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="details_content">
                    <div class="details_text">
                        <p>{{$category->description}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr style="width: 100%; height: 1px; margin-top: 50px">
    <h1 align="center">Товары категории</h1>

    <div class="row">
        @foreach($category->products as $product)
            @include('layouts.card',compact($product))
        @endforeach
    </div>
@endsection
