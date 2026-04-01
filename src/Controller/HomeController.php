<?php

namespace App\Controller;

use App\Services\VersionService;
use Ludens\Http\Response;

class HomeController extends BaseController
{
    public function __construct(
        private VersionService $versionService
    ) {
        parent::__construct();
    }

    public function index(): Response
    {
        return $this->view('home/index.html.twig', [
            'php_version' => PHP_VERSION,
            'ludens_version' => $this->versionService->getFrameworkVersion()
        ]);
    }
}
