@extends('theme')
@section('title')
    <title>История заказов</title>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <h2>Заказы</h2>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">Телефон</th>
                <th scope="col">Адрес</th>
                <th scope="col">комментарий</th>
                <th scope="col">статус</th>
                <th scope="col">Стоимость</th>
                <th scope="col">товары</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->comment}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->price}}р.</td>
                    <td>
                        <ul>
                        @foreach($item->products as $prod)
                                    <li>{{$prod->name}} {{$prod->pivot->count}}шт.</li>
                        @endforeach

                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
