<?php

namespace App\Http\Controllers\Blog\User;

use App\Http\Controllers\Blog\User\CoreController;

class HomeController extends CoreController
{

    /**
     * Display user's home page
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        return view('blog.user.index');
    }

}