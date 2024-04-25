<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class authController extends Controller
{
    public function auth(Request $request){
//        $user = User::where(['api_token' => $request->header('API_TOKEN')])->first();
//        $data = [
//            'login'     => $user->login,
//            'group_id'  => $user->group_id
//        ];
        $login = $request->get('login');
        $password = $request->get('password');

        $user = User::where(['login' => $login, 'password' => $password])->first();
        if(!$user){
            $response = [
                'status'    => false,
                'message'   => 'Логин немесе құпиясөз қате енгізілді'
            ];
            return response()->json($response);
        }
        $response = [
            'status'    => true,
            'message'   => 'You logged in successfully!',
            'api_token'   => $user->api_token
        ];
        return response()->json($response);
    }
}
