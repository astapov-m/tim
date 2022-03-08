@extends('layouts.master')
@section('css')
    <link href="/css/card.css" rel="stylesheet">
@endsection
@section('content')
    <div class="news" id="tree"></div>
    <div class="row" id="includedContent">
        @foreach($categories as $category)
            @if($category->visible === 1)
                <div class="item" style="margin-top: 20px; border-color: green; border-radius: 5px">
                    <div class="product">
                        <div class="thumb-img">
                            <img src="{{Storage::url($category->image)}}">
                            <div class="actions">
                                <a id="{{$category->id}}" name="{{$category->name}}" href="#" class="add-to-cart">Подробнее</a>
                            </div>
                        </div>
                        <div class="product-about">
                            <h3 class="product-title">
                                <p>{{$category->name}}</p>
                            </h3>
                        </div>
                    </div>
                </div>
            @endif
            @auth
                @if($category->visible === 0)
                    <div class="item" style="margin-top: 20px; border-color: green; border-radius: 5px">
                        <div class="product">
                            <div class="thumb-img">
                                <img src="{{Storage::url($category->image)}}">
                                <div class="actions">
                                    <a id="{{$category->id}}" name="{{$category->name}}" href="#" class="add-to-cart">Подробнее</a>
                                </div>
                            </div>
                            <div class="product-about">
                                <h3 class="product-title">
                                    <p>{{$category->name}}</p>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endif
            @endauth
        @endforeach
    </div>
    <script>
        var x = 0;
            $('.actions').on('click' ,function(e){
                if(x < 1) {
                    e.preventDefault();
                    var data = $(this).find('a').attr('id');
                    var name = $(this).find('a').attr('name');
                    console.log(data);
                    $("<a/>", {
                        id: data,
                        text: "Категории  ",
                        href: '#',
                        style: "color:black"
                    }).appendTo("#tree");

                    $("<a/>", {
                        id: data,
                        text: ">>" + name +" ",
                        style: "color:black"
                    }).appendTo("#tree");

                    $("#includedContent").load("/cardCategories/" + data, function () {
                    });
                    x++;
                }
            });
    </script>
    <script>
        $('.news').on('click' ,function(e){
            e.preventDefault();
            location.reload();
        });
    </script>

@endsection
