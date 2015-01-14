<?php
session_start();

$GLOBALS['config'] = array(         //globalna premnenna s configuracnymi udajmi
    'mysql' => array(               // databaza
        'host'     => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'db'       => 'fmfi'
    ),
    'session' =>array(              //  session admina
        'session_name' => 'admin',   
        'token_name'   => 'FMFIAdminToken'   

    )
);

spl_autoload_register(function($class){

    if(! @require_once( 'classes/'. $class. '.php')){
        require_once '../classes/'. $class. '.php';
    };  
});

?>
