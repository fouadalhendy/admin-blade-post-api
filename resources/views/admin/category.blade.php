@extends('loginadmin.html')
@section('con')

<table style="">
    <thead style="">
        <tr style=" margin:10px 0; display:flex; justify-content: space-between;">
            <th>tittle</th>
            <th>content</th>
            <th>imge</th>
            <th>update</th>
            <th>delete</th>
        </tr>
    </thead>
@forelse ( $categories as $category )

</table>
<table>
    <tr style=" display:flex; justify-content:space-between; margin-top:70px;">
        <td>{{$category->titel}}</td>
        <td style="width: 80px;">{{$category->content}}</td>
        <td style="">
            <img src="../imges/{{$category->imge}}" width="100px">
        </td>
        <td><a style=" background-color: rgb(26, 60, 83); border-radius: 16px; border:1px solid rgba(0, 0, 0, 0); padding:5px 20px; text-decoration: none;  color:rgb(251, 247, 247);" href="{{route('cate.edit',$category->id)}}">ubdate</a></td>
        <td><form action={{route('cate.destroy',$category->id)}} method="post">
            @method('DELETE')
            @csrf
            <button type="submit" style=" background-color: rgb(179, 29, 12); border-radius: 16px; border:1px solid rgba(0, 0, 0, 0);padding:5px 20px;color:rgb(251, 247, 247);">delete</button>
            </form></td>
        @empty

        @endforelse
        </tr>
</table>
@endsection
