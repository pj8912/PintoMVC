<?php
/*
*   Base controller  
*   Loads the models and views
*/

class Controller{

    // Load Model

    public function model($model)
    {
        // require Model file
        require_once '../app/models/'.$model.'.php';

        // Instanitate model....
        return new $model();

    }

    // Load View
    public function view($view, $data=[]){

        // check for view file
        if(file_exists('../app/views/'.$view.'.php')){

            // require once file..

            require_once '../app/views/'.$view.'.php';
        }   else{

            // view does not exists 
            die('View does not exists');
        }

    }
}