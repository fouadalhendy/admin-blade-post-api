<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style=" padding:0 30px; display:flex; flex-direction: column;  center; width:100vw; background-color: rgb(36, 196, 158);">
    <form action={{ route('auth.login')}} method="post" style="display: flex; flex-direction: column; align-items:center; justify-content:center; height:100vh; gap:30px;">
        @csrf
        <label for="email" style="cursor: pointer; background-color: rgba(26, 60, 83, 0.451); border-radius: 16px; font-size:30px; border:1px solid rgba(0, 0, 0, 0);padding:4px 135px;color:rgb(251, 247, 247);">email</label>
        <input type="text" name="email" id="email"style="height: 35px; width:300px; border-radius: 16px; padding:0 20px;  border: none; background-color:  rgb(105, 97, 97)color:white;">

        <label for="password"  style="cursor: pointer; background-color: rgba(26, 60, 83, 0.451); border-radius: 16px; font-size:30px; border:1px solid rgba(0, 0, 0, 0);padding:4px 118px;color:rgb(251, 247, 247);">password</label>
        <input type="password" name="password" id="password" style="height: 35px; width:300px; border-radius: 16px; padding:0 20px;  border: none; background-color:  rgb(105, 97, 97)color:white;">

        <button type="submit" style="cursor: pointer; background-color: rgb(26, 60, 83); border-radius: 16px; font-size:20px; border:1px solid rgba(0, 0, 0, 0);padding:5px 40px;color:rgb(251, 247, 247);">login</button>

    </form>
</div>
</body>
</html>

