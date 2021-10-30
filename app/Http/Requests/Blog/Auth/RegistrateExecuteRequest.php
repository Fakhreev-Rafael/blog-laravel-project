<?php

namespace App\Http\Requests\Blog\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class RegistrateExecuteRequest extends FormRequest
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
            'name' => ['required', 'max:200', 'string'],
            'email' => ['required', 'max:200', 'email:rfc,dns', 'unique:users,email'],
            'password' => ['required', 'max:200'],
            'password_confirm' => ['required', 'max:200', 'same:password'],
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'email_confirmation_key' => Str::random(32),
        ]);
    }
}
