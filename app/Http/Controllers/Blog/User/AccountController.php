<?php

namespace App\Http\Controllers\Blog\User;

use App\Http\Controllers\Blog\User\CoreController;
use App\Http\Requests\Blog\User\AccountUpdateRequest;
use App\Http\Requests\Blog\User\ConfrimEmailRequest;
use App\Services\Blog\UserService;

class AccountController extends CoreController
{
    /**
     * Display the user's account information
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit()
    {
        return view('blog.user.account.edit');
    }

    /**
     * Update the user's account information
     * 
     * @param App\Http\Requests\Blog\User\AccountUpdateRequest $request
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AccountUpdateRequest $request, UserService $userService)
    {
        $userService->update($request);

        return back();
    }

    /**
     * Confirm the user's email
     * 
     * @param App\Http\Requests\Blog\User\ConfrimEmailRequest $request
     */
    public function confirm(ConfrimEmailRequest $request, UserService $userService)
    {

        $userService->confirmEmail($request);

        return redirect()
            ->route('blog.user.home')
            ->with([
                'success' => true,
                'message' => 'Thanks! Your email is confirmed!',
            ]);
    }
}
