@extends('theme')
@section('content')

        <h2>Регистрация</h2>
        <form action="/register" method="post">
            @csrf

                <label for="">email</label>
                <input type="text" placeholder="email@email.ru" required name="email">
                @error('email'){{$message}}@enderror

                <label for="" >Пароль</label>
                <input type="password" placeholder="password123" required name="password">
                @error('password'){{$message}}@enderror

                <label for="" >Подтверждение пароля</label>
                <input type="password"  placeholder="password123" required name="password_confirmation">


            <button type="submit" class="btn btn-success">Зарегистрироваться</button>
        </form>
        <a href="/login"><button class="btn btn-primary">Войти</button></a>


@endsection
