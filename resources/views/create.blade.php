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
    <form method="post" action="/create/check" enctype="multipart/form-data">
        @csrf
        <input type="text" name="full_name" id="full_name" placeholder="Введите ФИО" class="form-control" autofocus="autofocus"><br>
        <input type="text" name="company" id="company" placeholder="Введите компанию" class="form-control"><br>
        <input type="number" name="phone" id="phone" placeholder="Введите телефон" class="form-control"><br>
        <input type="email" name="email" id="email" placeholder="Введите почту" class="form-control"><br>
        <input type="date" name="birthday" id="birthday" placeholder="Введите дату рождения" class="form-control"><br>
        <input type="file" name="photo" id="photo" placeholder="Загрузите фото" size="30000" class="form-control"><br>
        <button type="submit" class="btn btn-success">Создать</button>
    </form>
    </div>
    <br>
    @if(isset($message))
        <p class="alert alert-success">{{$message}}</p>
    @endif
@endsection
