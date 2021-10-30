<?php

namespace App\Services\Blog;

use App\Http\Requests\Blog\Auth\AuthenticateExecuteRequest;
use App\Http\Requests\Blog\Auth\ForgotPasswordExecuteRequest;
use App\Http\Requests\Blog\Auth\NewPasswordExecuteRequest;
use App\Http\Requests\Blog\Auth\RegistrateExecuteRequest;
use App\Http\Requests\Blog\User\AccountUpdateRequest;
use App\Http\Requests\Blog\User\ConfrimEmailRequest;
use App\Models\User;
use App\Repositories\Blog\UserRepository;
use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService
{

    /**
     * Return App\Repositories\Blog\UserRepository classname
     * 
     * @return string
     */
    protected function getRepositoryClass()
    {
        return UserRepository::class;
    }

    /**
     * Create a new user
     * 
     * @param App\Http\Requests\Blog\Auth\RegistrateExecuteRequest $request
     * 
     * @return void
     */
    public function create(RegistrateExecuteRequest $request)
    {
        $newUser = new User($request->only([
            'name',
            'email',
            'password',
            'email_confirmation_key',
        ]));

        $newUser->save();

    }

    /**
     * Check the input password and the database password
     * 
     * @param App\Http\Requests\Blog\Auth\AuthenticateExecuteRequest $request
     * 
     * @return boolean
     */
    protected function checkPassword(AuthenticateExecuteRequest $request)
    {
        $user = $this->userRepository->getUserByEmail($request->input('email'));

        if(Hash::check($request->input('password'), $user->password))
        {
            return true;

        } else
        {
            return false;
        }
    }

    /**
     * Confirm the user's email
     * 
     * @param App\Http\Requests\Blog\User\ConfrimEmailRequest $request
     * 
     * @return void
     */
    public function confirmEmail(ConfrimEmailRequest $request)
    {
        $user = $this->userRepository->getUserByEmail($request->input('email'));

        $user->is_email_confirmed = true;

        $user->save();

        if(Auth::check())
        {
            Auth::logout();

            $updatedUserForLogin = $this->userRepository->getUserByEmailForLogin($request->input('email'));

            Auth::login($updatedUserForLogin);
        }
    }

    /**
     * Log in the user
     * 
     * @param App\Http\Requests\Blog\Auth\AuthenticateExecuteRequest $request
     * 
     * @return boolean
     */
    public function login(AuthenticateExecuteRequest $request)
    {
        if($this->checkPassword($request))
        {
            $user = $this->userRepository->getUserByEmailForLogin($request->input('email'));

            Auth::login($user);

            return true;

        } else
        {
            return false;
        }
    }

    /**
     * Log out the user
     * 
     * @return boolean
     */
    public function logout()
    {

        Auth::logout();

    }

    /**
     * Set new value for update_password_key
     * 
     * @param App\Http\Requests\Blog\Auth\ForgotPasswordExecuteRequest $request
     * 
     * @return void
     */
    public function setUpdatePasswordKey(ForgotPasswordExecuteRequest $request)
    {
        $user = $this->userRepository->getUserByEmail($request->input('email'));

        $user->update_password_key = $request->input('update_password_key');

        $user->save();
    }

    /**
     * Update the user's password
     * 
     * @param App\Http\Requests\Blog\Auth\NewPasswordExecuteRequest $request
     * 
     * @return void
     */
    public function updatePassword(NewPasswordExecuteRequest $request)
    {
        $user = $this->userRepository->getUserByEmail($request->input('email'));

        $user->password = $request->input('password');

        $user->save();
    }

    /**
     * Update the authenticated user's data
     * 
     * @param App\Http\Requests\Blog\User\AccountUpdateRequest $request
     * 
     * @return void
     */
    public function update(AccountUpdateRequest $request)
    {

        $user = $this->userRepository->getUserByEmail(Auth::user()->email);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if($user->isDirty('email'))
        {
            $user->email_confirmation_key = $request->input('email_confirmation_key');
            $user->is_email_confirmed = false;
        }

        $user->save();

        Auth::logout();

        $updatedUserForLogin = $this->userRepository->getUserByEmailForLogin($request->input('email'));

        Auth::login($updatedUserForLogin);

    }
    

}