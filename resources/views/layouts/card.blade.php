<div class="item" style="margin-top: 20px">
    <div class="product">
        <div class="thumb-img">
            <img src="{{Storage::url($product->image)}}">
            <div class="actions">
                <a href="{{route('product',[$product->category->code,$product->code])}}" class="add-to-cart">Подробнее</a>
            </div>
        </div>
        <div class="product-about">
            <h3 class="product-title">
                <p>{{$product->name}}</p>
            </h3>
            @if(!$product->status)
            <span class="price"><i class="fa fa-rub"></i>
                Нет в наличии </span> @else
                <span class="price" style="color: green"><i class="fa fa-rub"></i> В наличии </span> @endif
            <p class="fa fa-rub">{{$product->price}} р/кг</p>
        </div>
    </div>
</div>



