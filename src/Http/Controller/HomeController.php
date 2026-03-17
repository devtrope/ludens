<?php

namespace App\Http\Controller;

class HomeController extends BaseController
{
    public function index(): void
    {
        $this->render('home/index.html.twig');
    }
}
