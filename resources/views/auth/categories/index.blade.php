@extends('auth.layouts.master')

@section('title', 'Категории')

@section('content')
    <div class="col-md-12">
        <h1>Категории</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Код
                </th>
                <th>
                    Название
                </th>
                <th>
                    Отображение
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($categories as $categoty)
                <tr>
                    <td>{{$categoty->id}}</td>
                    <td>{{$categoty->code}}</td>
                    <td>{{$categoty->name}}</td>
                    <td> @if($categoty->visible === 0) Для админа @else Для всех @endif</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{route('categories.destroy',$categoty)}}" method="POST">
                                <a class="btn btn-success" type="button" href="{{route('categories.show',$categoty)}}">Открыть</a>
                                <a class="btn btn-warning" type="button" href="{{route('categories.edit',$categoty)}}">Редактировать</a>
                                @method('DELETE')
                                @csrf
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
                @foreach($categoty->childrenCategories as $childrenCategory)
                    @include('auth.categories.layouts.children',compact('childrenCategory'))
                @endforeach
                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-success" type="button"
           href="{{route('categories.create')}}">Добавить категорию</a>
    </div>
@endsection
