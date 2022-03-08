@extends('auth.layouts.master')

@isset($category)
    @section('title', 'Редактировать категорию ')
@else
    @section('title', 'Создать категорию')
@endisset

@section('content')

    <div class="col-md-12">
        @isset($category)
            <h1>Редактировать категорию ( <b>{{$category->name}}</b>)</h1>
        @else
            <h1>Добавить категорию</h1>
        @endisset

        <form method="POST" enctype="multipart/form-data"
              @isset($category)
              action="{{route('categories.update',$category)}}"
              @else
              action="{{route('categories.store')}}"
            @endisset
        >
            @isset($category)
                @method('PUT')
            @endisset
            @csrf
            <div class="input-group row">
                <label for="code" class="col-sm-2 col-form-label">Код: </label>
                <div class="col-sm-6">

                    <input type="text" class="form-control" name="code" id="code"
                           value="@isset($category){{$category->code}}@endisset">
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
                <div id="includedContent"></div>
            <br>
            <div class="input-group row">
                <label for="name" class="col-sm-2 col-form-label">Название: </label>
                <div class="col-sm-6">

                    <input type="text" class="form-control" name="name" id="name"
                           value="@isset($category){{$category->name}}@endisset">
                </div>
            </div>

            <br>
            <div class="input-group row">
                <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                <div class="col-sm-6">

                        <textarea name="description" id="description" cols="72"
                                  rows="7" >@isset($category){{$category->description}}@endisset</textarea>
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
                @isset($category)
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
        </form>
    </div>

    <script>
        var x = 0;
        var h = 0;
        $("#test").click(function () {
            if(x < 1 ){
                $( "#includedContent" ).load( "/admin/car", function() {
                });
            }
            else{
                if($("#parent_id").length > 0){
                    $("<div/>", {
                        id: "includedContent" + x,
                    }).appendTo("#includedContent");

                    h = x + 1;

                    var data = $("#parent_id").serializeArray();

                    $("#parent_id").each(function () {
                        $(this).attr("id" , "parent_id" + x);
                    });

                    $("#parent_id"+x).prop('disabled',true);

                    $( "#includedContent"+ x ).load( "/admin/helpCar/"+data[0].value, function() {
                    });

                }else{
                    console.log(x);
                    h = x - 1;
                    $("#parent_id"+h).prop('disabled',false);
                }
            }
            x++;

        });

        $("#test1").click(function () {
            x = 0;
            $("#includedContent").empty();
        });
    </script>

@endsection
