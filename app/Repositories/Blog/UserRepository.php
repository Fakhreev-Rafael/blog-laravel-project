<?php

namespace App\Repositories\Blog;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{

    /**
     * Return classname of model
     * 
     * @return string
     */
    protected function getModelClass()
    {
        return User::class; 
    }

    /**
     * Return App\Models\User object or null
     * 
     * @param string $email
     * 
     * @return App\Models\User|null
     */
    public function getUserByEmail(string $email)
    {
        $columns = [
            'id',
            'name',
            'email',
            'password',
            'is_admin',
            'is_email_confirmed',
            'email_confirmation_key',
            'update_password_key',
            'password_updated_at',
        ];

        $result = $this->getModel()
            ->select($columns)
            ->where('email', $email)
            ->first();

        return $result;
    }

    /**
     * Return App\Models\User object or null
     * 
     * @param string $email
     * 
     * @return App\Models\User|null
     */
    public function getUserByEmailForLogin(string $email)
    {
        $columns = [
            'id',
            'name',
            'email',
            'is_admin',
            'is_email_confirmed',
        ];

        $result = $this->getModel()
            ->select($columns)
            ->where('email', $email)
            ->first();

        return $result;
    }

}