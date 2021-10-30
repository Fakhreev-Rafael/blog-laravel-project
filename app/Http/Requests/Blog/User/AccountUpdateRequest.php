<?php

namespace App\Http\Requests\Blog\User;

use App\Rules\UpdatedEmailNotExistRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class AccountUpdateRequest extends FormRequest
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
            'email' => ['required', 'max:200', 'email:rfc,dns', new UpdatedEmailNotExistRule()],
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
