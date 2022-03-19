@isset($categories)
@foreach($categories as $category)
    @if($category->visible === 1)
        @include('layouts.category',compact($category))
    @endif
    @auth
        @if($category->visible === 0)
            @include('layouts.category',compact($category))
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
                    style: "color:black",
                }).appendTo("#tree");
                $("#includedContent").load( "/cardCategories/"+data, function() {
                });
            }
    });
</script>
