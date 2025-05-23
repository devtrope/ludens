<?php

namespace Ludens\Support\Helpers;

class UrlHelper
{
    public static function asset(string $path): string
    {
        $baseUrl = rtrim($_ENV['APP_URL'], '/');
        $port = $_ENV['APP_PORT'];

        $showPort = ! in_array($port, ['80', '443']) ? ':' . $port : '';

        return $baseUrl . $showPort . '/assets/' . ltrim($path, '/');
    }
}