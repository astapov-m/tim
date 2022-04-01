@extends('auth.layouts.master')

@isset($event)
    @section('title', 'Редактировать категорию ')
@else
    @section('title', 'Создать категорию')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($event)
            <h1>Редактировать новость ( <b>{{$event->name}}</b>)</h1>
        @else
            <h1>Добавить новость</h1>
        @endisset

        <form method="POST" enctype="multipart/form-data"
              @isset($event)
              action="{{route('events.update',$event)}}"
              @else
              action="{{route('events.store')}}"
            @endisset
        >
            @isset($event)
                @method('PUT')
            @endisset
            @csrf
            <div class="input-group row">
                <label for="name" class="col-sm-2 col-form-label">Название: </label>
                <div class="col-sm-6">

                    <input type="text" class="form-control" name="name" id="name"
                           value="@isset($event){{$event->name}}@endisset">
                </div>
            </div>
            <br>
            <div class="input-group row">
                <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                <div class="col-sm-6">

                        <textarea name="description" id="description" cols="72"
                                  rows="7" >@isset($event){{$event->description}}@endisset</textarea>
                </div>
            </div>
                @isset($event)
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
                <div class="input-group row">
                    <label for="href" class="col-sm-2 col-form-label">Ссылка: </label>
                    <div class="col-sm-6">

                        <input type="text" class="form-control" name="href" id="href"
                               value="@isset($event){{$event->href}}@endisset">
                    </div>
                </div>
                <br>
            <button class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
