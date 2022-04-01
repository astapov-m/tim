<div class="item" style="margin-top: 20px; border-color: green; border-radius: 10px; border-width: 3px; position: relative">
    <div class="more">
    <div class="product">
        <div class="thumb-img">
            <img src="{{Storage::url($product->image)}}">
            <div class="actions">
                <a href="{{route('product',[$product->category->code,$product->code])}}" class="add-to-cart">Подробнее</a>
            </div>
        </div>
        <div class="product-about">
            <h3 class="product-title">
                <p style="font-size: 25px; font-family:Tahoma;color: #002d15">{{$product->name}}</p>
            </h3>
            @if(!$product->status)
            <span class="price"><i class="fa fa-rub"></i>
                Нет в наличии </span> @else
                <span class="price" style="color: green"><i class="fa fa-rub"></i> В наличии </span> @endif
            <p class="fa fa-rub" style="font-size: 18px">{{$product->price}} р/кг</p>
        </div>
    </div></div>
</div>



