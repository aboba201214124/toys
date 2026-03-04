@extends('theme')
@section('content')

    <div class="container">
        <h2>Авторизация</h2>
        <form action="/register" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Логин</label>
                <input type="text" class="form-control" placeholder="login123" required name="login">
                @error('login'){{$message}}@enderror

            </div>
            <div class="mb-3">
                <label for="" class="form-label">Пароль</label>
                <input type="password" class="form-control" placeholder="password123" required name="password">
                @error('password'){{$message}}@enderror

            </div>
            <div class="mb-3">
                <label for="" class="form-label">Подтверждение пароля</label>
                <input type="password" class="form-control" placeholder="password123" required name="password_confirmation">

            </div>

            <button type="submit" class="btn btn-success">Зарегистрироваться</button>
        </form>
        <a href="/login"><button class="btn btn-primary">Войти</button></a>
    </div>

@endsection
