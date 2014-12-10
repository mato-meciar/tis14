<?php
session_start();

$GLOBALS['config'] = array(         //globalna premnenna s configuracnymi udajmi
    'mysql' => array(               // databaza
        'host'     => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'db'       => 'social'
    ),
    'session' =>array(              //  session admina
        'session_name' => 'user',   
        'token_name'   => 'token'   //este neviem ci nechat

    )
);

spl_autoload_register(function($class){
  require_once 'classes/'. $class. '.php';  
});

require_once 'functions/sanitaze.php';
?>
