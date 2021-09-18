<?php

namespace App\Http\Requests;

class checkIfUserPermittedRequest extends MainRequest
{
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    
    public function authorize()
    {
        return request()->user()->tokenCan('check_user_permission');
    }

    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "permission_id"=>'required|exists:permissions,id',
            
        ];
    }
    
   
}
