<div class="item" style="margin-top: 20px; border-color: green; border-radius: 10px; border-width: 3px; position: relative">
    <div class="more">
    <div class="product">
        <div class="thumb-img">
            <img src="{{Storage::url($category->image)}}">
            <div class="actions">
                <a id="{{$category->id}}" name="{{$category->name}}" href="{{route('category',[$category->code,$category->id])}}" class="add-to-cart">Подробнее</a>
            </div>
        </div>
        <br>
    </div>
    <br>
    <div class="product-about" style="position: absolute; bottom: 0; margin:0 auto; left: 0;right: 0">
        <p class="product-title" style="font-size: 25px; font-family:Tahoma;color: #002d15">
            {{$category->name}}
        </p>
    </div></div>
</div>


