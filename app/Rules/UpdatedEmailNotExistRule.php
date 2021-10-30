<?php

namespace App\Rules;

use App\Repositories\Blog\UserRepository;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UpdatedEmailNotExistRule implements Rule
{

    /**
     * @var App\Repostories\Blog\UserRepository $userRepository
     */
    protected $userRepository;

    /**
     * Create a new rule instance.
     * 
     *
     * @return void
     */
    public function __construct()
    {
        $this->userRepository = app(UserRepository::class);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($value !== Auth::user()->email)
        {

            $user = $this->userRepository->getUserByEmail($value);

            if(!is_null($user))
            {
                return false;
            }

        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute is invalid';
    }
}
