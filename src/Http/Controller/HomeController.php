<?php

namespace App\Http\Controller;

use Ludens\Http\Response;

class HomeController extends BaseController
{
    public function index(): Response
    {
        return $this->view('home/index.html.twig');
    }
}
