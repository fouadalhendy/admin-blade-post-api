@extends('loginadmin.html')

@section('con')
<form action={{route('cate.update',$category->id)}} method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="titel" value={{$category->titel}}>
    <input type="text" name="content" value={{$category->content}}>
    <img src="./imges/{{$category->imge}}" width="150px">
    <input type="file" name="imge">
    <button type="submit">update</button>
</form>
@endsection
