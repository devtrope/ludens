<?php

namespace Ludens\Http;

use Ludens\Builder\Application;

class Route
{
    /**
     * @var string
     */
    private string $controller;

    /**
     * @var string
     */
    private string $method;

    /**
     * @var array
     */
    protected array $parameters = [];

    public function __construct(Request $request)
    {
        $segments = $request->segments();

        $this->controller = $segments[0] ?: Application::getDefaultController();
        $this->method = $segments[1] ?? Application::getDefaultMethod();
        $this->parameters = array_slice($segments, 2);
    }

    /**
     * Returns the parameters.
     *
     * @return array
     */
    public function parameters(): array
    {
        return $this->parameters;
    }

    /**
     * Returns the controller name.
     *
     * @return string
     */
    public function controllerName(): string
    {
        $controller = ucfirst($this->controller);

        // Ensure the controller name can be used even if it contains underscores
        if (stripos($controller, '_') !== false) {
            $controller = ucwords($controller, '_');
            $controller = str_replace('_', '', $controller);
        }

        return $controller . 'Controller';
    }

    /**
     * Returns the method name based on the HTTP method.
     *
     * @param string $httpMethod
     * @return string
     */
    public function methodName(string $httpMethod): string
    {
        $method = $this->method;

        // Ensure the method name can be used even if it contains underscores
        if (stripos($this->method, '_') !== false) {
            $method = ucwords($this->method, '_');
            $method = str_replace('_', '', $method);
        }

        return strtolower($httpMethod) . ucfirst($method);
    }
}
