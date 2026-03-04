@extends('theme')
@section('content')
    <div class="container">
        <h2>{{Auth::user()->login}}</h2>
        <nav class="nav">
            <a class="nav-link active" aria-current="page" href="/profile">Профиль</a>
            <a class="nav-link" href="/profile/history">Заказы</a>
            @if(Auth::user()->admin == 1)
                <a class="nav-link" href="/adminpanel">Админ-панель</a>
            @endif
        </nav>
    </div>
@endsection
