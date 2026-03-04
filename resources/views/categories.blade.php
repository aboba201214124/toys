@extends('theme')
@section('title')
    <title>Категории</title>
@endsection
@section('content')
    <div class="header-bottom">
        <div class="categories">
            @foreach($categories as $category)
                <a href="/category/{{$category->id}}" class="all-categories">{{$category->name}}</a>
            @endforeach
        </div>
    </div>

@endsection
