<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class AuthoController extends Controller
{


    public function logi()
    {

        return view('loginadmin.login');
    }

    public function login(Request $request,User $user)
    {


        $val=$request->validate([
                'email'=> 'required|email|string',
                'password'=>'required|string|min:8'
        ]);
        $user=user::where('email',$val['email'])->first();
        if($user['is_admin'])
        {
            if(Auth::attempt($val)){
            $request->session()->regenerate();
            return redirect()->intended("/");
            }
            return back();
        }elseif(!$user||!hash::check($val['password'],$user->password)||$user['is_bocked']===1){

            return response()->json([
                "massage"=>"error"
            ],200);

        }else{
            $token=$user->createToken($user->name .'-authtoken')->plainTextToken;
            return response()->json([
                "token"=>$token
            ],200);
        }


    }
    public function logout(Request $request){
        $user=auth()->user();
        if($user['is_admin']===1){
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");}
        else{
            $user->tokens()->delete();
            return response()->json([
                "massage"=>"logout"
            ],200);
        }
    }


    public function register(Request $request,User $user)
    {
        $data=$request->validate([
                'name'=>'required|string',
                'email'=> 'required|email|string|unique:users',
                'password'=>'required|string|min:8',
                'imge'=>'required|image'
        ]);
        if ($request->hasFile("imge")) {
            $imge = $request->imge;
            $imgname = time() . '.' . $imge->getClientOriginalExtension();;
            $imge->move(public_path('imges'), $imgname);
        }
        $user= new user;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->imge=$imgname;
            $user->password=hash::make($request->password);
            $user->save();

        return response()->json([
            "massage"=>'user create'
        ],201);
    }
}
