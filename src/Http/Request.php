<?php

namespace Ludens\Http;

class Request
{
    private string $httpMethod;
    private string $uri;

    public function __construct()
    {
        $this->httpMethod = strval($_SERVER['REQUEST_METHOD']);
        $this->uri = strval($_SERVER['REQUEST_URI']);
    }

    /**
     * Returns the HTTP method of the request.
     *
     * @return string
     */
    public function getHttpMethod(): string
    {
        return $this->httpMethod;
    }

    /**
     * Returns the URI of the request.
     *
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * Returns the different parts of the URI.
     *
     * @return array
     */
    public function segments(): array
    {
        $parsedURI = parse_url($this->getUri(), PHP_URL_PATH);

        if (! is_string($parsedURI)) {
            return [];
        }

        return explode('/', trim($parsedURI, '/'));
    }
}
