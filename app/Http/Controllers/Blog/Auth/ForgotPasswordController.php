<?php

namespace App\Http\Controllers\Blog\Auth;

use App\Http\Controllers\Blog\Auth\CoreController;
use App\Http\Requests\Blog\Auth\ForgotPasswordExecuteRequest;
use App\Http\Requests\Blog\Auth\NewPasswordExecuteRequest;
use App\Services\Blog\UserService;

class ForgotPasswordController extends CoreController
{
    /**
     * Display form of forgot-password
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function forgotPassword()
    {
        return view('blog.auth.forgot-password');
    }

    /**
     * Execute form of forgot-password
     * 
     * @param App\Http\Requests\Blog\Auth\ForgotPasswordExecuteRequest $request
     */
    public function execute(ForgotPasswordExecuteRequest $request, UserService $userService)
    {
        $userService->setUpdatePasswordKey($request);

        return back()
            ->with([
                'success' => true,
                'message' => 'Please, check your email!',
            ]);
    }

    
}
