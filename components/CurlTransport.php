<?php

namespace Pmrt\components;

use Pmrt\interfaces\Transport;

class CurlTransport implements Transport
{
    public function getPage(string $url): string
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', $url, [
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36',
                'accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3',
                'accept-encoding' => 'gzip',
                'accept-language' => 'ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7',
                'cache-control' => 'max-age=0',
            ]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Response status code exception: '.$response->getStatusCode());
        }

        return $response->getBody();
    }
}