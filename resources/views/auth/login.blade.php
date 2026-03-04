@extends('theme')
@section('content')

        <h2>Авторизация</h2>
        <form action="/login" method="post">
            @csrf
                <label for="" >email</label>
                <input type="text" placeholder="email@email.ru" required name="email">
                @error('email'){{$message}}@enderror
                <label for="" >Пароль</label>
                <input type="password"  placeholder="password123" required name="password">

            <button type="submit" class="btn btn-success">Авторизоваться</button>
        </form>
        <a href="/register"><button class="btn btn-primary">Зарегистрироваться</button></a>

@endsection
