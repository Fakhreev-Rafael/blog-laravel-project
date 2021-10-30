<?php

namespace App\Http\Requests\Blog\Auth;

use App\Rules\CorrectUpdatePasswordKeyRule;
use Illuminate\Foundation\Http\FormRequest;

class NewPasswordExecuteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'max:200', 'email:rfc,dns', 'exists:users,email'],
            'key' => ['size:32', new CorrectUpdatePasswordKeyRule($this->email)],
            'password' => ['required', 'max:200'],
            'password_confirm' => ['required', 'max:200', 'same:password'],
        ];
    }

    /**
    * Configure the validator instance.
    *
    * @param  \Illuminate\Validation\Validator  $validator

    * @return void
    */    
    public function withValidator($validator)
    {
        $invalidValues = $validator->invalid();

        if(array_key_exists('email', $invalidValues) || array_key_exists('key', $invalidValues))
        {
            
            abort(404);
        }
       
    }

    
}
