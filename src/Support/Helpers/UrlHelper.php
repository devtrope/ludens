<?php

namespace Ludens\Support\Helpers;

class UrlHelper
{
    /**
     * Returns the path to an asset
     *
     * @param string $path
     * @return string
     */
    public static function asset(string $path): string
    {
        $baseUrl = rtrim(strval($_ENV['APP_URL']), '/');
        $port = strval($_ENV['APP_PORT']);

        $showPort = ! in_array($port, ['80', '443']) ? ':' . $port : '';

        return $baseUrl . $showPort . '/assets/' . ltrim($path, '/');
    }
}
