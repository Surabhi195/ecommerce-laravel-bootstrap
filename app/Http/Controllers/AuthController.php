<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $req){
        $data = $req->only(['name','email','password']);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $token = JWTAuth::fromUser($user);
        return response()->json(['user'=>$user,'access_token'=>$token]);
    }

    public function login(Request $req){
        $credentials = $req->only(['email','password']);
        if(!$token = auth('api')->attempt($credentials)){
            return response()->json(['error'=>'invalid_credentials'],401);
        }
        return response()->json(['access_token'=>$token,'user'=>auth('api')->user()]);
    }

    public function me(){
        return response()->json(auth('api')->user());
        }

    // public function logout(){ 
    //     auth('api')->logout(); 
    //     return response()->json(['status'=>'logged_out']);
    // }
   // Logout user
    public function logout(Request $request)
    {
        // Clear session
        $request->session()->forget('user');
        $request->session()->forget('jwt_token');

        // Logout JWT
        auth()->guard('api')->logout();

        return redirect('/login');
    }
}
