<?php

/*
    creates app core class
    creates url and loads controller
    URL FORMAT- /controller/methods/params
*/




class Core{
    protected $currentController = 'pages';
    protected $currentMethod = 'index';
    protected $params = [];


    public function __construct(){

       
        $url = $this->getUrl();

        // Look in controllers for first index
        if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
           
            // if exists set as controller(current)
            $this->currentController = ucwords($url[0]);

            // unset 0 index
            unset($url[0]);
        }

        // require the controller..
        require_once '../app/controllers/'.$this->currentController.'.php';

        // Instantiate controller the class..
        $this->currentController = new $this->currentController;

        // check for second(index) part of url
        if(isset($url[1])){

            // check to see if method exists...
            if(method_exists($this->currentController, $url[1])){
                
                // if exists set as current method...
                $this->currentMethod = $url[1];

                // unset index [1]
                unset($url[1]);
            }
        }

        // echo $this->currentMethod;

        // Get params...
        $this->params = $url ? array_values($url): [];

        // call a callback with array of params...
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }


    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        else 
            {
                $pages = ['Pages'];
                return $pages;
            }
    }
}