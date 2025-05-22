<?php

namespace Ludens\Http;

class Router
{
    /**
     * Resolve the route and call the appropriate controller method.
     *
     * @param \Ludens\Http\Route $route
     * @param string $httpMethod
     * @throws \Exception
     * @return void
     */
    public static function resolve(Route $route, string $httpMethod): void
    {
        $controllerClass = 'App\\Http\\Controllers\\' . $route->controllerName();

        if (! class_exists($controllerClass)) {
            throw new \Exception("Controller not found: $controllerClass");
        }

        $controllerInstance = new $controllerClass();
        $methodName = $route->methodName($httpMethod);

        if (! method_exists($controllerInstance, $methodName)) {
            throw new \Exception("Call to undefined method: $controllerClass->$methodName()");
        }

        $callable = [$controllerInstance, $methodName];

        if (! is_callable($callable)) {
            throw new \Exception("Method not callable: $controllerClass->$methodName()");
        }

        $parameters = self::resolveParameters($controllerInstance, $methodName, $route->parameters());

        $response = call_user_func_array($callable, $parameters);

        if ($response instanceof Response) {
            $response->send();
        }
    }

    /**
     * Resolve the parameters for the controller method.
     *
     * @param object $controller
     * @param string $methodName
     * @param array $parameters
     * @throws \Exception
     * @return array
     */
    public static function resolveParameters(object $controller, string $methodName, array $parameters): array
    {
        $reflection = new \ReflectionMethod($controller, $methodName);
        $expectedParameters = $reflection->getParameters();

        if (count($parameters) > count($expectedParameters)) {
            throw new \Exception("Too many parameters provided for method $methodName()");
        }

        $resolvedParameters = [];

        foreach ($expectedParameters as $index => $parameter) {
            if (array_key_exists($index, $parameters)) {
                $resolvedParameters[] = $parameters[$index];
                continue;
            }

            if ($parameter->isDefaultValueAvailable()) {
                $resolvedParameters[] = $parameter->getDefaultValue();
                continue;
            }

            if ($parameter->allowsNull()) {
                $resolvedParameters[] = null;
                continue;
            }

            throw new \Exception("Missing required parameter: " . $parameter->getName());
        }

        return $resolvedParameters;
    }
}
