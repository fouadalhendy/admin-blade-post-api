@extends('loginadmin.html')
@section('con')
<form style="display: flex; flex-direction: column; align-items:center; justify-content:center; height:100vh; gap:30px;" action={{route('cate.store')}} method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <input style="height: 35px; width:300px; border-radius: 16px; padding:0 20px;  border: none; background-color:  rgb(105, 97, 97)color:white;" type="text" name="titel" placeholder="Title">
        <input style="height: 35px; width:300px; border-radius: 16px; padding:0 20px;  border: none;   " type="text" name="content" placeholder="Content">
    </div>
    <input type="file" name="imge" style=" background-color: rgb(26, 60, 83); border-radius: 16px; border:1px solid rgba(0, 0, 0, 0);padding:5px 20px;color:rgb(251, 247, 247);">
    <button type="submit" style="cursor: pointer; background-color: rgb(26, 60, 83); border-radius: 16px; font-size:20px; border:1px solid rgba(0, 0, 0, 0);padding:5px 20px;color:rgb(251, 247, 247);">create</button>
</form>
@endsection
