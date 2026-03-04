<div class="products-item" data-category="{{$product->category_id}}" data-id="{{$product->id}}">
    <div class="img-container">
        <img src="" alt="{{$product->name}}">
    </div>
    <div class="content">
        <h3>{{$product->name}}</h3>
        <p class="price">{{$product->price}} р.</p>
        <button class="btn add-to-cart">В корзину</button>
    </div>
</div>
