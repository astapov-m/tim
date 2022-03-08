@extends('auth.layouts.master')

@section('title', 'Новости')

@section('content')
    <div class="col-md-12">
        <h1>Новости</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
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
            @foreach($events as $event)
                <tr>
                    <td>{{$event->id}}</td>
                    <td>{{$event->name}}</td>
                    <td> @if($event->visible === 0) Для админа @else Для всех @endif</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{route('events.destroy',$event)}}" method="POST">
                                <a class="btn btn-success" type="button" href="{{route('events.show',$event)}}">Открыть</a>
                                <a class="btn btn-warning" type="button" href="{{route('events.edit',$event)}}">Редактировать</a>
                                @method('DELETE')
                                @csrf
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-success" type="button"
           href="{{route('events.create')}}">Добавить новость</a>
    </div>
@endsection
