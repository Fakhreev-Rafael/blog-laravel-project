<?php

namespace App\Observers;

use App\Mail\BlogCreatedAccountEmail;
use App\Mail\BlogForgotPasswordEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class BlogUserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        Mail::to($user->email)->send(new BlogCreatedAccountEmail($user));
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        
        if($user->isDirty('update_password_key'))
        {
            Mail::to($user->email)->send(new BlogForgotPasswordEmail($user));        
        }

        if($user->isDirty('email'))
        {
            Mail::to($user->email)->send(new BlogCreatedAccountEmail($user));
        }
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
