<?php

namespace App\Controller;

use Ludens\Http\Response;
use Composer\InstalledVersions;

class HomeController extends BaseController
{
    public function index(): Response
    {
        return $this->view('home/index.html.twig', [
            'php_version' => PHP_VERSION,
            'ludens_version' => InstalledVersions::getPrettyVersion('devtrope/framework')
        ]);
    }
}
