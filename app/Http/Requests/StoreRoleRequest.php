<?php

namespace App\Http\Requests;

class StoreRoleRequest extends MainRequest
{
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    
    public function authorize()
    {
        return request()->user()->tokenCan('role_create');
    }

    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title"=>'required|string|unique:roles,title',
            'permissions'=>'required|array',
            'permissions.*'=>'exists:permissions,id'
        ];
    }
    
   
}
