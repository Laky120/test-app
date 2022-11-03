@extends('layout')

@section('title')
    Удалить
@endsection

@section('main')
    <h1>Удаление по номеру</h1>
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
    <form method="post" action="/delete/check">
        @csrf
        <input type="number" name="number" id="number" placeholder="Введите номер" class="form-control"><br>
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
    </div>
    <br>
    @if(isset($message))
        <p class="alert alert-success">{{$message}}</p>
    @endif
    @if(isset($message_err))
        <p class="alert alert-danger">{{$message_err}}</p>
    @endif
@endsection
