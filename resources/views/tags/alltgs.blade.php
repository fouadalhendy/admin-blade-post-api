@extends('loginadmin.html')
@section('con')
<table>
    <tr style=" display:flex; justify-content:space-between; margin-top:70px;">
        <th>names tag</th>
        <th>titel post</th>
        <th>update</th>
        <th>delete</th>
    </tr>

@forelse ($tags as $tag )
<tr style=" display:flex; justify-content:space-between; margin-top:70px;">
    <td style="width: 30%">{{$tag->name}}</td>
    <td style="width: 30%">{{$tag->posts()->first()->titel}}</td>
    <td style="width: 30%"><a style=" text-decoration: none; font-size:30px; color:white;" href="{{route('tag.ediet',$tag->id)}}" >upbate tag</a></td>

    <td><form action={{route('tag.destroy',$tag->id)}} method="post">
        @method('DELETE')
        @csrf
        <button type="submit" style=" background-color: rgb(179, 29, 12); border-radius: 16px; border:1px solid rgba(0, 0, 0, 0);padding:5px 20px;color:rgb(251, 247, 247);">delete</button>
        </form></td>
</tr>
@empty

@endforelse



</table>
@endsection
