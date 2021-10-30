<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;


abstract class BaseRepository
{

    /**
     * @var Illuminate\Database\Eloquent\Model $model
     */
    protected $model;

    /**
     * Assign the model of the current repository
     * 
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * Return classname of model
     * 
     * @return string
     */
    abstract protected function getModelClass();

    /**
     * Return clone of the current model-object
     * 
     * @return Illuminate\Database\Eloquent\Model
     */
    protected function getModel()
    {
        return clone $this->model;
    }

}