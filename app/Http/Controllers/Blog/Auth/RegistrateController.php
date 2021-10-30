<?php

namespace App\Http\Controllers\Blog\Auth;

use App\Http\Controllers\Blog\Auth\CoreController;
use App\Http\Requests\Blog\Auth\RegistrateExecuteRequest;
use App\Services\Blog\UserService;

class RegistrateController extends CoreController
{
    /**
     * Display a form of registration
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function registration()
    {
        return view('blog.auth.registration');
    }

    /**
     * Execute registration of the new user
     * 
     * @param App\Http\Requests\Blog\Auth\RegistrateExecuteRequest $request
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function execute(RegistrateExecuteRequest $request, UserService $userService)
    {
        $userService->create($request);
        
        return back()
            ->with([
                'success' => true,
                'message' => 'You have successfully registered!',
            ]);

    }
}
