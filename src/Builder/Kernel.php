<?php

namespace Ludens\Builder;

class Kernel
{
    /**
     * Handles the incoming request and resolves the route.
     *
     * @param \Ludens\Http\Request $request
     * @return void
     */
    public static function handle(\Ludens\Http\Request $request): void
    {
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
