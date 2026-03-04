@extends('theme')
@section('banner')
    <section class="banner">
        <h1>🎪 Добро пожаловать в "Господин Ребёнок"! 🎁</h1>
        <p>Только сегодня — скидка 15% на все конструкторы!</p>
    </section>
@endsection
@section('categories')
    <div class="header-bottom">
        <div class="categories">
            @foreach($categories as $category)
                <a href="/category/{{$category->id}}" class="all-categories" data-category="{{$category->id}}">{{$category->name}}</a>
            @endforeach
        </div>
    </div>
@endsection
@section('content')
    <section class="products-wrapper mb-50">
        @foreach($products as $product)
            @include('parts.card', ['product' =>$product])
        @endforeach
    </section>
@endsection
