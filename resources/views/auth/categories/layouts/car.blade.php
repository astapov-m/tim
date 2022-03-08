@if(!$categories->isEmpty())
<br>
<div class="input-group row">
    <label for="parent_id" class="col-sm-2 col-form-label">Категория: </label>
    <div class="col-sm-6">
        <select name="parent_id" id="parent_id" class="form-control">
            @foreach($categories as $category)
                <br>
                <option value="{{$category->id}}"
                        @isset($product)
                        @if($product->category_id == $category->id)
                        selected
                    @endif
                    @endisset
                >{{$category->name}}</option>
            @endforeach
        </select>
    </div>
</div>
@endif
