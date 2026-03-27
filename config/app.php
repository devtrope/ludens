<?php

return [

    /*
     |-------------------------------------------------------------
     | Current mode of the application (debug or production)
     |-------------------------------------------------------------
     */
    'mode' => env('APP_MODE', 'debug'),
    
    /*
     |-------------------------------------------------------------
     | Public URL of the application
     |-------------------------------------------------------------
     */
    'url' => env('APP_URL', 'http://localhost:8000'),

    /*
     |-------------------------------------------------------------
     | Default locale for the application
     |-------------------------------------------------------------
     */
    'locale' => env('APP_LOCALE', 'en'),

    /*
     |-------------------------------------------------------------
     | Application name, used in templates and emails
     |-------------------------------------------------------------
     */
    'name' => env('APP_NAME', 'Ludens'),

    /*
     |-------------------------------------------------------------
     | Default controller when no route is matched
     |-------------------------------------------------------------
     */
    'default_controller' => env('DEFAULT_CONTROLLER', 'home'),

    /*
     |-------------------------------------------------------------
     | Default method when no route is matched
     |-------------------------------------------------------------
     */
    'default_method' => env('DEFAULT_METHOD', 'index'),
    
];
