@isset($categories)
@foreach($categories as $category)
    @if($category->visible === 1)
    <div class="item" style="margin-top: 20px; border-color: green; border-radius: 5px">
        <div class="product">
            <div class="thumb-img">
                <img src="{{Storage::url($category->image)}}">
                <div class="actions">
                    <a id="{{$category->id}}" name="{{$category->name}}" href="#" class="add-to-cart">Подробнее</a>
                </div>
            </div>
            <div class="product-about">
                <h3 class="product-title">
                    <p>{{$category->name}}</p>
                </h3>
            </div>
        </div>
    </div>
    @endif
    @auth
        @if($category->visible === 0)
            <div class="item" style="margin-top: 20px; border-color: green; border-radius: 5px">
                <div class="product">
                    <div class="thumb-img">
                        <img src="{{Storage::url($category->image)}}">
                        <div class="actions">
                            <a id="{{$category->id}}" name="{{$category->name}}" href="#" class="add-to-cart">Подробнее</a>
                        </div>
                    </div>
                    <div class="product-about">
                        <h3 class="product-title">
                            <p>{{$category->name}}</p>
                        </h3>
                    </div>
                </div>
            </div>
        @endif
    @endauth
@endforeach
@endisset
@isset($cat)
    <h3 align="center">Товары:</h3>
<div class="row">
    @foreach($cat->products as $product)
        @if($product->visible === 1)
            @include('layouts.card',compact($product))
        @endif
        @auth
                @if($product->visible === 0)
                    @include('layouts.card',compact($product))
                @endif
        @endauth
    @endforeach
</div>
@endisset
<script>
    $('.actions').on('click' ,function(e){
        if($(this).find('a').attr('href') === '#'){
            e.preventDefault();
            var data = $(this).find('a').attr('id');
            var name = $(this).find('a').attr('name');
            console.log(data);
            $("<a/>", {
                id: data,
                text: ">>"+name,
                style: "color:black"
            }).appendTo("#tree");
            $("#includedContent").load( "/cardCategories/"+data, function() {
            });
        }
    });
</script>

