@extends('theme')
@section('content')
    <div class="container">
        <div class="row">
            <h2>Корзина </h2>
        </div>
        <div class="container">
            <a href="/order/create"><button class="btn btn-primary">Перейти к оформлению {{\App\Services\CartServices::count()['sum']}}р.</button></a>
            <a href="/cart/clear"><button class="btn btn-primary">Очистить корзину</button></a>
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
            @foreach(Auth::user()->cart as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td><a href="/cart/minus/{{$item->id}}">-</a> {{$item->pivot->quantity}} <a href="/cart/add/{{$item->id}}">+</a></td>
                <td>{{$item->price}}</td>
                <td>{{$item->img}}</td>
                <td><a href="/cart/destroy/{{$item->id}}"><button class="btn btn-primary">Удалить</button></a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
