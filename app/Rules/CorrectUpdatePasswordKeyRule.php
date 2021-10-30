<?php

namespace App\Rules;

use App\Repositories\Blog\UserRepository;
use Illuminate\Contracts\Validation\Rule;

class CorrectUpdatePasswordKeyRule implements Rule
{

    /**
     * @var string $email
     */
    protected $email;

    /**
     * @var App\Repostories\Blog\UserRepository $userRepository
     */
    protected $userRepository;

    /**
     * Create a new rule instance.
     *
     * @param string $email
     * 
     * @return void
     */
    public function __construct(string $email)
    {
        $this->email = $email;
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
        $user = $this->userRepository->getUserByEmail($this->email);

        if(!is_null($user))
        {

            if($user->update_password_key === $value)
            {
                return true;
            }

        }

        return false;
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
