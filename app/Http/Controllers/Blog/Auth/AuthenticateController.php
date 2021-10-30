<?php

namespace App\Http\Controllers\Blog\Auth;

use App\Http\Controllers\Blog\Auth\CoreController;
use App\Http\Requests\Blog\Auth\AuthenticateExecuteRequest;
use App\Services\Blog\UserService;

class AuthenticateController extends CoreController
{
    /**
     * Display a form of authentication
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function authentication()
    {
        return view('blog.auth.authentication');
    }

    /**
     * Execute registration of the new user
     * 
     * @param App\Http\Requests\Blog\Auth\AuthenticateExecuteRequest $request
     * 
     * @return
     */
    public function execute(AuthenticateExecuteRequest $request, UserService $userService)
    {
        if($userService->login($request))
        {
            return redirect()
                ->route('blog.user.home')
                ->with([
                    'success' => true,
                    'message' => 'You have successfully authenticated!',
                ]);

        } else
        {
            return back()
                ->withErrors([
                    'password' => 'The selected password is invalid',
                ]);
        }
    }
}
