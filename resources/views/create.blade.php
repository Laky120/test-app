@extends('layout')


@section('title')
    Создать
@endsection

@section('main')
    <h1>Добавление записи</h1>
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
    <div style="width: 400px">
    <form method="post" action="/create/check">
        @csrf
        <input type="number" name="number" id="number" placeholder="Введите номер" class="form-control"><br>
        <input type="text" name="type" id="type" placeholder="Введите тип" class="form-control"><br>
        <input type="text" name="file" id="file" placeholder="Введите файл" class="form-control"><br>
        <button type="submit" class="btn btn-success">Создать</button>
    </form>
    </div>
    <br>
    @if(isset($message))
        <p class="alert alert-success">{{$message}}</p>
    @endif
@endsection
