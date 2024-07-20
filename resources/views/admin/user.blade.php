@extends('loginadmin.html')
@section('con')
<table>
        <tr  style=" display:flex; justify-content:space-between;align-items: end; margin-top:70px;">
            <td style="width: 10%">name</td>
            <td style="width: 10%">email</td>
            <td style="width: 17%">imge</td>
            <td style="width: 10%">block</td>
            <td style="width: 10%">unblock</td>
            <td style="width: 10%">delete</td>
            <td style="width: 10%">do_you_block</td>
        </tr>

@forelse ( $users as $user )
<tr  style=" display:flex; justify-content:space-between; margin-top:70px;">

        <td style="width: 9%">{{$user->name}}</td>
        <td style="width: 9%">{{$user->email}}</td>
        <td style="width: 15%"> <img src="../imges/{{$user->imge}}" width="90px"></td>
        <td style="width: 9%"><a style=" background-color: rgb(26, 60, 83); border-radius: 16px; border:1px solid rgba(0, 0, 0, 0); padding:5px 20px; text-decoration: none;  color:rgb(251, 247, 247);" href="{{route('user.block',$user->id)}}">block</a></td>
        <td style="width: 9%"><a style=" background-color: rgb(26, 60, 83); border-radius: 16px; border:1px solid rgba(0, 0, 0, 0); padding:5px 20px; text-decoration: none;  color:rgb(251, 247, 247);" href="{{route('user.unblck',$user->id)}}">unblock</a></td>
        <td style="width: 9%"><form action={{route('user.destroy',$user->id)}} method="post">
            @method('DELETE')
            @csrf
            <button type="submit" style=" background-color: rgb(179, 29, 12); border-radius: 16px; border:1px solid rgba(0, 0, 0, 0);padding:5px 20px;color:rgb(251, 247, 247);">delete</button>
            </form>
        </td>
        <td style="width: 9%">
            @if ($user->is_bocked)
            <p>block</p>
            @else

            @endif
        </td>
</tr>

@empty

@endforelse

</table>
@endsection
