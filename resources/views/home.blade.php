@extends('layout')


@section('title')
    Главная
@endsection

@section('main')
    <h1>Все файлы</h1>
    <table class="table table-striped table-hover table-borderless">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Номер</th>
            <th>Тип</th>
            <th>Файл</th>
        </tr>
        </thead>
        <tbody class="table-dark">
        @foreach($products as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->number}}</td>
                <td>{{$item->type}}</td>
                <td>{{$item->file}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
