@extends('layout')


@section('title')
    Изменить
@endsection

@section('main')
    <h1>Изменение записи</h1>
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
        <form method="post" action="/update/check?id={{$data['note_id']}}" enctype="multipart/form-data">
            @csrf
            <input type="text" value="{{$data['full_name']}}" name="full_name" id="full_name" placeholder="Введите ФИО" class="form-control" autofocus="autofocus"><br>
            <input type="text" value="{{$data['company']}}" name="company" id="company" placeholder="Введите компанию" class="form-control"><br>
            <input type="number" value="{{$data['phone']}}" name="phone" id="phone" placeholder="Введите телефон" class="form-control"><br>
            <input type="email" value="{{$data['email']}}" name="email" id="email" placeholder="Введите почту" class="form-control"><br>
            <input type="date" value="{{$data['birthday']}}" name="birthday" id="birthday" placeholder="Введите дату рождения" class="form-control"><br>
            <input type="file" name="photo_new" id="photo_new" placeholder="Загрузите фото" size="30000" class="form-control"><br>
            <input type="text" value="{{$data['photo']}}" name="photo" id="photo" hidden="hidden" class="form-control"><br>
            <button type="submit" class="btn btn-success">Изменить</button>
        </form>
    </div>
@endsection
