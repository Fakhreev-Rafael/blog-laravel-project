<?php

namespace App\Http\Requests\Blog\User;

use App\Rules\CorrectConfirmEmailKeyRule;
use Illuminate\Foundation\Http\FormRequest;

class ConfrimEmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->hasParameters();
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
            'key' => ['size:32', new CorrectConfirmEmailKeyRule($this->email)],
        ];
    }

    /**
     * Check the current request has parameters
     * 
     * @return boolean
     */
    protected function hasParameters()
    {
        return $this->has('email') && $this->has('key');
    }

    /**
    * Configure the validator instance.
    *
    * @param  \Illuminate\Validation\Validator  $validator

    * @return void
    */    
    public function withValidator($validator)
    {
        if($validator->fails())
        {
            abort(404);
        }
    }
}
