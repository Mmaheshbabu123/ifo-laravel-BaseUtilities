<?php

namespace Packages\IfoBaseUtilities\Http\Services;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

abstract class AbstractApiService
{
    protected string $method = 'POST';

    private Client $httpClient;

    protected string $url;

    protected bool $decryptResponse = false;

    public function __construct()
    {
        $this->httpClient = new Client;
    }

    public function makeApiCall(array $body)
    {
        $request = new Request(
            $this->getMethod(),
            $this->getUrl(),
            $this->getHeaders(),
            $this->prepareBody($body)
        );

        $response = $this->httpClient->send(
            $request,
            ['http_errors' => false]
        );

        $result = $this->decryptResponse($response);

        if ($response->getStatusCode() != 200) {
            throw new Exception($result);
        }
        
        return $result;
    }


    public function decryptResponse($response)
    {
        return json_decode($response->getBody(), true);
    }


    protected function getHeaders(): array
    {
        return [
            'accept' => 'application/json',
            'content-type' => 'application/json',
        ];
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): AbstractApiService
    {
        $this->url = $url;
        return $this;
    }

    public function prepareBody(array $body): string
    {
        return json_encode($body);
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function setMethod(?string $method): AbstractApiService
    {
        $this->method = $method;
        return $this;
    }
}