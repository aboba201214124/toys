@extends('theme')
@section('title')
    <title>Корзина</title>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <h2>Корзина </h2>
        </div>
        <div class="container">
            <a href="/cart/clear"><button class="btn btn-primary">Очистить корзину</button></a>
            <a href="/order/create"><button class="btn btn-primary">Оформить заказ {{$totalSum}}р.</button></a>
            <a href="/cart/history"><button class="btn btn-primary">Заказы</button></a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Количество</th>
                <th scope="col">Цена</th>
                <th scope="col">Изображение</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cartProducts as $item)
            <tr>
                <td>{{$item->product->name}}</td>
                <td><a href="/cart/minus/{{$item->product->id}}">-</a> {{$item->count}} <a href="/cart/add/{{$item->product->id}}">+</a></td>
                <td>{{$item->product->price}}</td>
                <td>{{$item->product->img}}</td>
                <td><a href="/cart/destroy/{{$item->product->id}}"><button class="btn btn-primary">Удалить</button></a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
