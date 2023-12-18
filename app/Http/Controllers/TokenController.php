<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TokenController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email'=>'required|string|unique:users',
            'password'=>'required|string',
            'c_password' => 'required|same:password'
        ]);

        $user = new User([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        var_dump($user);
        if($user->save()){
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->plainTextToken;

            return response()->json([
            'message' => 'Successfully created user!',
            'accessToken'=> $token,
            ],201);
        }
        else{
            return response()->json(['error'=>'Provide proper details']);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);

    }


    /**
     *  Get The authenticated User
     *
     *  @return [json] user object
     *
     */
    public function user(Request $request) {
        return response()->json($request->user());
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email','password']);
        if(!Auth::attempt($credentials))
        {
            return response()->json([
                'message' => 'Unauthorized'
            ],401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->plainTextToken;

        return response()->json([
            'accessToken' =>$token,
            'token_type' => 'Bearer',
        ]);
    }


    public function generate_token(Request $request) {


        $user = $request->user();
        $token = $user->createToken('token-name')->plainTextToken;

        return response()->json([
            'token' => $token,
        ]);
    }

    public function verify_token(Request $request) {
        if ($request->user()->tokenCan('scope')){
            return response()->json([
                'message' => 'token is valid',
            ], 200);
        } else {
            return response()->json([
                'message' => 'not valid'
            ], 403);
        }
    }
}
