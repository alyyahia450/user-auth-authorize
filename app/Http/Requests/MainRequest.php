<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Traits\ResponseFormatTrait;

class MainRequest extends FormRequest
{
    use ResponseFormatTrait;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
   
    protected function failedAuthorization()
    {
        throw new HttpResponseException($this->sendError('unauthorized to do this action','',$code=403,''));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
    protected function failedValidation(Validator $validator) {
   
        throw new HttpResponseException($this->sendError($validator->errors()->first(),'',$code=200,''));
    }
}
