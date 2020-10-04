<?php
    /**
     * Created by PhpStorm.
     * User: triest
     * Date: 04.10.2020
     * Time: 14:37
     */

    namespace App\Services;


    use GuzzleHttp\Client;
    use GuzzleHttp\Psr7\Response;



    class HttpClient
    {
        public function send(array $payload) : Response
        {
            return app(Client::class)
                    ->request('POST', 'https://postman-echo.com/post', $payload);
        }
    }