@extends('theme')
@section('title')
    <title>Оформление заказ</title>
@endsection
@section('content')
    <h2>Оформление заказа</h2>
    <form action="/order/create" method="post">
        @csrf
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Имя" name="name" required>
        </div>
        <div class="mb-3">
            <input type="tel" class="form-control" placeholder="Телефон" name="phone" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Адрес" name="address" required>
        </div>
        <div class="mb-3">
            <textarea name="comment" id="" cols="30" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Оформить</button>
    </form>
@endsection
