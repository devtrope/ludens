<?php

use Ludens\Http\Response;
use Ludens\View\ViewRenderer;

if (! function_exists('view')) {
    function view(string $template, array $data = []): Response
    {
        return new Response((new ViewRenderer())->render($template, $data));
    }
}
