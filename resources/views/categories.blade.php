@extends('theme')
@section('title')
    <title>Категории</title>
@endsection
@section('content')
    <section class="products-wrapper mb-50">
        <div class="categories">
            @foreach($categories as $category)
                <a href="/category/{{$category->id}}" class="all-categories">{{$category->name}}</a>
            @endforeach
        </div>
    </section>

@endsection
