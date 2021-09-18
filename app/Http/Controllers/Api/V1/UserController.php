<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use App\Http\Requests\checkIfUserPermittedRequest;

use Symfony\Component\HttpFoundation\Response;

use App\Models\User;

use App\Http\Resources\UserResource;

use App\Traits\ResponseFormatTrait;
use Exception;

class UserController extends Controller
{
    use ResponseFormatTrait;
    public function __construct()
    {
        $this->middleware('scope:user_access')->only('index');
        $this->middleware('scope:user_show')->only('show');
        $this->middleware('scope:user_delete')->only('destroy');
    }

    public function index(){

       return $this->sendResponse(UserResource::collection(User::with('roles')->get()), 'users');
       
    }


    public function store(StoreUserRequest $request){
        try{
            
            $user = User::create($request->validated());
            $user->roles()->sync($request->input('roles', []));
            return $this->sendResponse(new UserResource($user), 'User Created Successfully');
            
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), $code = 200,'');
        }
    }

    public function show(User $user){

        return $this->sendResponse(new UserResource($user), 'The User');
    }


    public function update(UpdateUserRequest $request,User $user){


        $user->update($request->validated());
        $user->roles()->sync($request->input('roles', []));
        return $this->sendResponse(new UserResource($user), 'User Data Updated Successfully');

    }

    public function destroy(User $user){

        $user->delete();
        return $this->sendResponse(null, 'user deleted');

    }

    public function checkIfUserPermitted(checkIfUserPermittedRequest $request,User $user){
           
        $is_permitted=$user->roles()->whereHas('permissions',function($q)use($request){
            $q->where('id',$request->permission_id);
        })->exists();
       
        return $this->sendResponse(['permitted'=>$is_permitted], 'checked');
    }
     
}