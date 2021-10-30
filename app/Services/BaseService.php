<?php

namespace App\Services;

abstract class BaseService
{
    /**
     * @var App\Repositories\BaseRepository $repository
     */
    protected $userRepository;

    /**
     * Create App\Repositories\BaseRepository object
     * 
     */
    public function __construct()
    {
       $this->userRepository = app($this->getRepositoryClass()); 
    }

    /**
     * Return classname of repository
     * 
     * @return string
     */
    abstract protected function getRepositoryClass();
}