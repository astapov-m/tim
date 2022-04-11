@extends('auth.layouts.master')

@isset($product)
    @section('title', 'Редактировать товар ' . $product->name)
@else
    @section('title', 'Создать товар')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($product)
            <h1>Редактировать товар <b>{{ $product->name }}</b></h1>
        @else
            <h1>Добавить товар</h1>
        @endisset
        <form method="POST" enctype="multipart/form-data"
              @isset($product)
              action ="{{route('products.update',$product)}}"
              @else
              action="{{route('products.store')}}"
            @endisset
        >
            <div>
                @isset($product)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Код: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="code" id="code"
                               value="@isset($product){{$product->code}}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($product){{$product->name}}@endisset">
                    </div>
                </div>
                <br>
                    <div class="input-group row">
                        <label  class="col-sm-2 col-form-label">Категория: </label>
                        <div class="col-sm-6">
                            <a style="color: white" class="btn btn-success"  id="test">+</a>
                            <a style="color: white" class="btn btn-danger" id="test1">-</a>
                        </div>
                    </div>
                    <br>
                <div class="input-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">Категория: </label>
                    <div class="col-sm-6">
                        <select @isset($product) disabled @endif name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                        @isset($product)
                                        @if($product->category_id == $category->id)
                                        selected
                                    @endif
                                    @endisset
                                >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                    <div id="includedContent"></div>
                    <br>
                    <div class="input-group row">
                        <label for="status" class="col-sm-2 col-form-label">Статус </label>
                        <div class="col-sm-6">
                            <select name="status" id="status" class="form-control">
                                <option value="0"
                                        @isset($product)
                                        @if($product->status == 0)
                                        selected
                                    @endif
                                    @endisset
                                >Нет в наличии</option>
                                <option value="1"
                                        @isset($product)
                                        @if($product->status == 1)
                                        selected
                                    @endif
                                    @endisset
                                >В наличии</option>
                            </select>
                        </div>
                    </div>
                    <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                    <div class="col-sm-6">

                        <textarea name="description" id="description" cols="72"
                                  rows="7">@isset($product){{$product->description}}@endisset</textarea>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="price" class="col-sm-2 col-form-label">Цена: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="price" id="price"
                               value="@isset($product){{$product->price}}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file">
                            Загрузить <input type="file" style="display: none;" name="image" id="image">
                        </label>
                    </div>
                </div>
                <br>

                    <div class="input-group row">
                        <label for="cardPDF" class="col-sm-2 col-form-label">Карточка: </label>
                        <div class="col-sm-10">
                            <label class="btn btn-default btn-file">
                                Загрузить <input type="file" style="display: none;" name="cardPDF" id="cardPDF">
                            </label>
                        </div>
                    </div>
                    <br>
                    @isset($product)
                    <div class="input-group row">
                        <label for="visible" class="col-sm-2 col-form-label">Отображение</label>
                        <div class="col-sm-6">
                            <select name="visible" id="visible" class="form-control">
                                <option value="0">Для админа</option>
                                <option value="1">Для всех</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    @endisset
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
    <script>
        var x = 1;
        var h = 0;
        $("#test").click(function () {
                if($("#category_id").length > 0){
                    $("<div/>", {
                        id: "includedContent" + x,
                    }).appendTo("#includedContent");

                    h = x + 1;

                    var data = $("#category_id").serializeArray();

                    $("#category_id").each(function () {
                        $(this).attr("id" , "category_id" + x);
                    });

                    $("#category_id"+x).prop('disabled',true);

                    $( "#includedContent"+ x ).load( "/admin/helpCarProduct/"+data[0].value, function() {
                    });

                }else{
                    console.log(x);
                    h = x - 1;
                    $("#category_id"+h).prop('disabled',false);
                }

            x++;

        });

        $("#test1").click(function () {
            x = 0;
            $("#includedContent").empty();
            $('select[name="category_id"]').each(function () {
                $(this).attr("id" , "category_id");
            });
            $("#category_id").prop('disabled',false);
        });
    </script>
    <script>
        $("#category_id").click(function () {
            console.log(123);

        });
    </script>
@endsection

