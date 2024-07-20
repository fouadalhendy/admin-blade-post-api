@extends('loginadmin.html')
@section('con')
<form action={{route('tag.store')}} method="post" enctype="multipart/form-data">
    @csrf
    <select name="post" id="">
        <option value="">in post</option>
        @foreach ($posts as $post )
            <option value="{{$post->id}}">{{$post->titel}}</option>
        @endforeach
    </select>
    @foreach ($users as $user )
        <input type="checkbox" value="{{$user->name}}" name="user[]">{{$user->name}}</input>
    @endforeach


    <button type="submit">create</button>
</form>
@endsection
