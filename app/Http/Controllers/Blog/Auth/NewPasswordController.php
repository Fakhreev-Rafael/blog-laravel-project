<?php

namespace App\Http\Controllers\Blog\Auth;

use App\Http\Controllers\Blog\Auth\CoreController;
use App\Http\Requests\Blog\Auth\NewPasswordExecuteRequest;
use App\Http\Requests\Blog\Auth\NewPasswordRequest;
use App\Services\Blog\UserService;

class NewPasswordController extends CoreController
{
    /**
     * Display form of new-password
     * 
     * @param App\Http\Requests\Blog\Auth\NewPasswordRequest $request
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function newPassword(NewPasswordRequest $request)
    {
        return view('blog.auth.new-password', compact('request'));
    }

    /**
     * Execute form of new-password
     * 
     * @param App\Http\Requests\Blog\Auth\NewPasswordExecuteRequest $request
     */
    public function execute(NewPasswordExecuteRequest $request, UserService $userService)
    {
        $userService->updatePassword($request);

        return redirect()
            ->route('blog.user.authentication')
            ->with([
                'success' => true,
                'message' => 'The password was updated successfully!',
            ]);
    }

}
