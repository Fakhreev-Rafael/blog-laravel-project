<?php

namespace App\Http\Controllers\BLog\Auth;

use App\Http\Controllers\Blog\Auth\CoreController;
use App\Services\Blog\UserService;

class LogOutController extends CoreController
{
    /**
     * Execute the user's logging out
     */
    public function execute(UserService $userService)
    {
        $userService->logout();

        return redirect()
            ->route('blog.user.home');
    }
}
