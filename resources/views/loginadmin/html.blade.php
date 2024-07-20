<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titel')</title>
</head>
<body style=" display:flex; height:100vh;">
<nav style="background-color: rgb(26, 60, 83); width:25%; display:flex; flex-direction: column;  align-items: center; height:100%; justify-content: center;">
    <ul >
        <li style="margin: 20px 0 ; list-style:none;" >
            <a style=" text-decoration: none; font-size:30px; color:white;" href="{{route('cate.create')}}" >add category</a>
        </li >
        <li style="margin: 20px 0 ; list-style:none;" >
            <a style=" text-decoration: none; font-size:30px; color:white;" href="{{route('cate.index')}}" >show category</a>
        </li >

        <li style="margin: 20px 0 ; list-style:none;">
            <a style=" text-decoration: none; font-size:30px; color:white; " href={{route('user.index')}} >shwo user</a>
        </li>
        <li style="margin: 20px 0 ; list-style:none;">
            <a style=" text-decoration: none; font-size:30px; color:white;" href={{route('tag.index')}} >show tag</a>
        </li>
        <li style="margin: 20px 0 ; list-style:none;">
            <a style=" text-decoration: none; font-size:30px; color:white;" href={{route('tag.create')}} >create tag</a>
        </li>

        <li style="margin: 20px 0; list-style:none;">
            <a style=" text-decoration: none; font-size:30px; color:white;" href={{route('auth.logout')}} >logout</a>
        </li>
    </ul>
</nav>
<div class="con" style=" padding:0 30px; display:flex; flex-direction: column;  center; width:100vw; background-color: rgb(36, 196, 158);">
    @yield('con')

</div>
</body>
</html>
