<?php

use Ludens\Core\Application;

$app = Application::getInstance();
$app->usePathsFrom(require __DIR__ . '/../config/paths.php');
$app->loadEnvironmentFrom(__DIR__ . '/../.env'); 
$app->loadConfiguration();
return $app;