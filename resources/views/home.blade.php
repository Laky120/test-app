@extends('layout')


@section('title')
    Главная
@endsection

@section('main')
    <h3>Поиск по id</h3>
    <div style="width: 330px">
        <form method="get" action="/find/check">
            @csrf
            <input type="number" name="number" id="number" placeholder="Введите id" class="form-control"><br>
            <button type="submit" class="btn btn-success">Найти</button>
        </form>
    </div>
    <br>
    <h1>Все записи</h1>
    <table class="table table-striped table-hover table-borderless">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>ФИО</th>
            <th>Компания</th>
            <th>Телефон</th>
            <th>Почта</th>
            <th>Дата рождения</th>
            <th>Фото</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody class="table-dark">
        @foreach($notes as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->full_name}}</td>
                <td>{{$item->company}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->birthday}}</td>
                <td>{{$item->photo}}</td>
                <td>
                    <form method="get" action="/update">
                        @csrf
                        <input value="{{$item->id}}" type="number" name="note_id" id="note_id" class="form-control" hidden="hidden">
                        <input value="{{$item->full_name}}" type="text" name="full_name" id="full_name" class="form-control" hidden="hidden">
                        <input value="{{$item->company}}" type="text" name="company" id="company" class="form-control" hidden="hidden">
                        <input value="{{$item->phone}}" type="number" name="phone" id="phone" class="form-control" hidden="hidden">
                        <input value="{{$item->email}}" type="text" name="email" id="email" class="form-control" hidden="hidden">
                        <input value="{{$item->birthday}}" type="date" name="birthday" id="birthday" class="form-control" hidden="hidden">
                        <input value="{{$item->photo}}" type="text" name="photo" id="photo" class="form-control" hidden="hidden">
                        <button type="submit" class="btn btn-sm btn-warning">изменить</button>
                    </form>
                </td>
                <td>
                    <form method="post" action="/delete/check">
                        @csrf
                        <input value="{{$item->id}}" type="number" name="number" id="number" class="form-control" hidden="hidden">
                        <button type="submit" class="btn btn-sm btn-danger">удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>
    <div>{{$notes->links()}}</div>
@endsection
