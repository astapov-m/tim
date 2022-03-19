@extends('layouts.master')
@section('css')
    <link href="/css/card.css" rel="stylesheet">
    <link href="/css/product.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
@endsection
@section('content')
    <a href="{{route('categories')}}" style="float: left;color: black">Категории</a>
    @foreach($product->category->getParents() as $category)
        <p style="float: left"> >> {{$category->name}}</p>
        @endforeach
    <p style="float: left"> >> {{$product->category->name}}</p>
    <br>
    <h3 align="center"><div class="product-about">
            @if(!$product->status)
                <span class="price"><i class="fa fa-rub"></i>
                Нет в наличии </span> @else
                <span class="price" style="color: green"><i class="fa fa-rub"></i> В наличии </span> @endif
            <p class="fa fa-rub">{{$product->price}} р/кг</p>
        </div> </h3>
    <h6  align="center"><canvas id="my_canvas"></canvas></h6>
    <script>
        pdfjsLib.getDocument('{{Storage::url($product->cardPDF)}}').then(doc => {
            doc.getPage(1).then(page=>{
                var myCanvas = document.getElementById("my_canvas");
                var context = myCanvas.getContext("2d");

                var viewport = page.getViewport(myCanvas.width / page.getViewport(0.4).width);
                myCanvas.width = viewport.width;
                myCanvas.height = viewport.height;

                page.render({
                    canvasContext: context,
                    viewport: viewport
                });
            });

        });

    </script>
@endsection
