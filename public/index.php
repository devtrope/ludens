<?php

if (PHP_SESSION_NONE === session_status()) {
    session_start();
}

require_once __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->init(new \Ludens\Http\Request());
