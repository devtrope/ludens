<?php

use App\Model\User;
use Ludens\Auth\Security\Authentication;

$authentication = new Authentication();

return [

    /*
     |-------------------------------------------------------------
     | Model used for the authentication
     |-------------------------------------------------------------
     */
    'model' => User::class,

    /*
     |-------------------------------------------------------------
     | Field used for authentication
     |-------------------------------------------------------------
     */
    'authentication_field' => 'username',

    /*
     |-------------------------------------------------------------
     | Field used for the password
     |-------------------------------------------------------------
     */
    'password_field' => 'password',

    /*
     |-------------------------------------------------------------
     | Route to redirect when authentication worked
     |-------------------------------------------------------------
     */
    'redirect_after_login' => '/',

    /*
     |-------------------------------------------------------------
     | Route to redirect when user is logged out
     |-------------------------------------------------------------
     */
    'redirect_after_logout' => '/',

    /*
     |-------------------------------------------------------------
     | Route to login
     |-------------------------------------------------------------
     */
    'login_route' => '/login',

    /*
     |-------------------------------------------------------------
     | Route security configuration
     |-------------------------------------------------------------
     */

    'security' => $authentication
        ->guest('/login')
        ->public('/locale')
        ->protected('/')
        ->public('/contact')
    
];
