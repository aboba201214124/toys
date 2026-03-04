@extends('theme')
@section('content')

    <div class="container">
        <h2>Авторизация</h2>
        <form action="/login" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Логин</label>
                <input type="text" class="form-control" placeholder="login123" required name="login">
                @error('login'){{$message}}@enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Пароль</label>
                <input type="password" class="form-control" placeholder="password123" required name="password">
            </div>

            <button type="submit" class="btn btn-success">Авторизоваться</button>
        </form>
        <a href="/register"><button class="btn btn-primary">Зарегистрироваться</button></a>
    </div>

@endsection
