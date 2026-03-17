<?php

namespace App\Http\Controller;

use App\Http\Repository\RoleRepository;
use App\Http\Repository\UserRepository;

class HomeController extends BaseController
{
    public function index(): void
    {
        $this->render('home/index.html.twig');
    }
}
