@extends('theme')
@section('title')
    <title>Категории</title>
@endsection
@section('categories')
    <div class="header-bottom">
        <div class="categories">
            @foreach($categories as $cat)
                @if($cat->id == $category->id)
                    <a href="/category/{{$cat->id}}" class="active all-categories" data-category="{{$cat->id}}">{{$cat->name}}</a>
                @else
                    <a href="/category/{{$cat->id}}" class="all-categories" data-category="{{$cat->id}}">{{$cat->name}}</a>
                @endif
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
