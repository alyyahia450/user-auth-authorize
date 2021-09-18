<?php

namespace App\Http\Requests;

class UpdateRoleRequest extends MainRequest
{
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    
    public function authorize()
    {
        return request()->user()->tokenCan('role_edit');
    }

    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title"=>'required|string|unique:roles,title,'.$this->role->id,
            'permissions'=>'required|array',
            'permissions.*'=>'exists:permissions,id'
        ];
    }
    
   
}
