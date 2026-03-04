@extends('theme')
@section('title')
<title>История заказов</title>
@endsection
@section('content')
    <h2>{{Auth::user()->login}} История</h2>
    <nav class="nav">
        <a class="nav-link active" aria-current="page" href="/profile">Профиль</a>
        <a class="nav-link" href="/profile/history">Заказы</a>
        @if(Auth::user()->admin == 1)
            <a class="nav-link" href="/adminpanel">Админ-панель</a>
        @endif
    </nav>
    <div class="container">
        <div class="row">
            @foreach(Auth::user()->order as $order)
                <div class="col">
                    <h5>Номер заказа: #{{$order->id}}</h5>
                    <p>Адресс доставки: {{$order->address}}</p>
                    <p>Комментарий: {{$order->comment}}</p>
                    @if($order->status == 0)
                        <p>Статус заказа: Рассматривается</p>
                    @endif
                    @if($order->status == 1)
                        <p>Статус заказа: Принята</p>
                    @endif
                    @if($order->status == 2)
                        <p>Статус заказа: Отклонена</p>
                    @endif
                    <ul>
                        @foreach($order->products as $product)
                            <li>{{$product->name}} {{$product->price}}р. {{$product->pivot->quantity}}шт.</li>
                        @endforeach
                    </ul>
                    <p>Стоимость: {{$order->price}}р.</p>
                </div>
            @endforeach
        </div>
    </div>

@endsection
