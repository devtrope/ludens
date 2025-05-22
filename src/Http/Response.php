<?php

namespace Ludens\Http;

class Response
{
    /**
     * @var string
     */
    private string $body = '';

    /**
     * @var array
     */
    private array $headers = [];

    /**
     * @var int
     */
    private int $statusCode = 200;

    /**
     * @var bool
     */
    private bool $sent = false;

    public function __construct(
        string $body = '',
        int $statusCode = 200,
        array $headers = []
    ) {
        $this->body = $body;
        $this->statusCode = $statusCode;
        $this->headers = $headers;
    }

    /**
     * Sets a header for the response.
     *
     * @param string $key
     * @param string $value
     * @return self
     */
    public function withHeader(string $key, string $value): self
    {
        $clone = clone $this;
        $clone->headers[$key] = $value;

        return $clone;
    }

    /**
     * Sets the status code of the response.
     *
     * @param int $statusCode
     * @return self
     */
    public function withStatus(int $statusCode): self
    {
        $clone = clone $this;
        $clone->statusCode = $statusCode;

        return $clone;
    }

    /**
     * Sets the body of the response.
     *
     * @param string $body
     * @return self
     */
    public function withBody(string $body): self
    {
        $clone = clone $this;
        $clone->body = $body;

        return $clone;
    }

    /**
     * Sends the response to the client.
     *
     * @return void
     */
    public function send(): void
    {
        if ($this->sent) {
            return;
        }

        http_response_code($this->statusCode);

        foreach ($this->headers as $key => $value) {
            header("$key: $value");
        }

        echo $this->body;

        $this->sent = true;
    }
}
