<?php

namespace App\Http\Requests;

class StoreUserRequest extends MainRequest
{
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    
    public function authorize()
    {
        return request()->user()->tokenCan('user_create');
    }

    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name"=>'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'roles'=>'array',
            'roles.*'=>'exists:roles,id'
        ];
    }
    
   
}
