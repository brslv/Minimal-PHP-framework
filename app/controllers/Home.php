<?php

class Home extends BaseController {

    public function index()
    {
        // Getting a User object from the User model.
        $user = $this->model('User');
        $user->setUsername('Borislav Grigorov');
        
        // Calling the default view.
        $this->view('default.view', [$user]);
    }
    
    /**
     * Gets the required view.
     * Overrides BaseController::view().
     * @param string $view
     * @param array $user
     */
    public function view($view, $user = [])
    {
        $user = $user[0];
        require_once '../app/views/' . $view . '.php';
    }
    
}
