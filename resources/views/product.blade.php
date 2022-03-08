@extends('layouts.master')
@section('css')
    <link href="/css/card.css" rel="stylesheet">
    <link href="/css/product.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
@endsection
@section('content')
    <h1 align="center">{{$product->name}} </h1>
    <h6  align="center"><canvas id="my_canvas"></canvas></h6>
    <script>
        pdfjsLib.getDocument('{{Storage::url($product->cardPDF)}}').then(doc => {
            doc.getPage(1).then(page=>{
                var myCanvas = document.getElementById("my_canvas");
                var context = myCanvas.getContext("2d");

                var viewport = page.getViewport(1);
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
