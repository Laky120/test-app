@extends('layout')

@section('title')
    Найти
@endsection

@section('main')
    <h1>Поиск по номеру</h1>
    <br>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div style="width: 330px">
    <form method="get" action="/find/check">
        @csrf
        <input type="number" name="number" id="number" placeholder="Введите номер" class="form-control"><br>
        <button type="submit" class="btn btn-success">Найти</button>
    </form>
    </div>
    <br>
    @if(isset($message))
        <p class="alert alert-danger">{{$message}}</p>
    @endif
    @if(isset($products))
        <h1>Найдены файлы по номеру {{$number}}:</h1>
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
    @endif
@endsection
