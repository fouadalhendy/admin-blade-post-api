@extends('loginadmin.html')
@section('con')
<form action={{route('tag.update',$tag->id)}} method="post" enctype="multipart/form-data">
    @csrf
    <select name="post" id="">
        <option value="">in post</option>
        @foreach ($posts as $post )
            <option value="{{$post->id}}"

            @if ($post->id===$tag->posts()->first()->id)
                selected
            @endif >{{$post->titel}}</option>
        @endforeach
    </select>
    @foreach ($users as $user )
    @php
        $us=explode(",",$tag->name)
    @endphp
        <input type="checkbox" value="{{$user->name}}" name="user[]"
        @for ($i=0;$i<count($us);$i++)
            @if ($user->name==$us[$i])
                checked
            @endif
        @endfor


        >{{$user->name}}</input>
    @endforeach


    <button type="submit">create</button>
</form>
@endsection
