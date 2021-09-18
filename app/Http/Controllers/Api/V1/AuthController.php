<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

use App\Models\User;

use App\Http\Resources\UserResource;

use App\Traits\ResponseFormatTrait;
use App\Traits\TokenScopesTrait;

class AuthController extends Controller
{
    use ResponseFormatTrait,TokenScopesTrait;

    public function register(RegisterRequest $request){

        $user=User::create($request->validated());
        $token= $this->createTokenWithScopes($user); #TokenScopesTrait assigning scopes based on permissions
        return $this->sendResponse(['user' => new UserResource($user), 'token' => $token], 'Registeration Done');
    }

    public function login(LoginRequest $request){
      
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password]) ){
            $user = auth()->user();
            // $request->session()->regenerate();
            $token= $this->createTokenWithScopes($user); #TokenScopesTrait assigning scopes based on permissions
             return $this->sendResponse(['user' => new UserResource($user), 'token' => $token], 'logged in successfully');
        } else {
            return $this->sendError('invalid credentials', '', $code = 200, '');
        }
    }

    public function logout(Request $request){

        $request->user()->tokens()->delete();
        $request->session()->invalidate();
        return $this->sendResponse(null, 'logged out successfully');
    }



}
