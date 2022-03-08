@extends('auth.layouts.master')

@section('title', 'Категория ')

@section('content')
    <div class="col-md-12">
        <h1>Новость</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $event->id }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $event->name }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $event->description}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection

