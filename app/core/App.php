<?php

class App {

    private $controller = 'Home';
    private $method = 'index';
    private $args = [];

    public function __construct()
    {
        $url = $this->deconstructUrl();
        
        /**
         * Changing the controller from the default one (Home), to the provided by the user.
         * If no controller provided - fall back to the default (Home).
         */
        if(file_exists('../app/controllers/' . ucfirst($url[0]) . '.php'))
        {
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        }
        
        /**
         * Instantiate a new controller object.
         */
        require_once '../app/controllers/' . $this->controller . '.php';
        
        $this->controller = new $this->controller;
        
        /**
         * If this controller has the method provided by the url, set the App::constroller to it.
         * If no method provided - fall back to the default (index).
         */
        if(isset($url[1]))
        {
            if(method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        
        /**
         * Setting the params.
         */
        $this->params = $url ? array_values($url) : [];
        
        /**
         * Calling the Controller::method.
         */
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Deconstructs the url and returns it in the form of array.
     * @return array
     */
    private function deconstructUrl() 
    {
        if(isset($_GET['url']))
        {
            $url = $_GET['url'];
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = rtrim($url, '/');
            $url = explode('/', $url);
            return $url;
        }
    }
    
}