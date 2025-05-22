<?php

namespace Ludens\Builder;

class Kernel
{
    public static function handle(\Ludens\Http\Request $request): void
    {;
        try {
            \Ludens\Http\Router::resolve(
                new \Ludens\Http\Route($request),
                $request->getHttpMethod()
            );
        } catch (\Exception $e) {
            http_response_code(500);
            echo $e->getMessage();
        }
    }
}
