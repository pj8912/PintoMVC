<?php
    
    //LOAD config
    
    require_once 'config/config.php';


// Autoload core library

spl_autoload_register(function($className){
    require_once 'libraries/'.$className.'.php';
});

