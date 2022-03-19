<tr>
    <td>{{$childrenCategory->id}}</td>
    <td>{{$childrenCategory->code}}</td>
    <td>{{$childrenCategory->name}}</td>
    <td> @if($childrenCategory->visible === 0) Для админа @else Для всех @endif</td>
    <td>
        <div class="btn-group" role="group">
            <form action="{{route('categories.destroy',$childrenCategory)}}" method="POST">
                <a class="btn btn-success" type="button" href="{{route('categories.show',$childrenCategory)}}">Открыть</a>
                <a class="btn btn-warning" type="button" href="{{route('categories.edit',$childrenCategory)}}">Редактировать</a>
                @method('DELETE')
                @csrf
                <input class="btn btn-danger" type="submit" value="Удалить"></form>
        </div>
    </td>
</tr>
@if($childrenCategory->categories)
@foreach($childrenCategory->childrenCategories as $childrenCategory)
    @include('auth.categories.layouts.children',compact('childrenCategory'))
@endforeach
@endif
