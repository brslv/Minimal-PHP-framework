<?php

class BaseController {
    
    /**
     * Calls the required model and instantiates a new object of that model.
     * Retruns that object.
     * @param string $model
     * @return \model
     */
    protected function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
    
    /**
     * Calls the required view and passes it some data (if any).
     * @param string $view
     * @param array $data
     */
    protected  function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }
    
}
