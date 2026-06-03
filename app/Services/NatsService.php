<?php

namespace App\Services;

use Basis\Nats\Client;
use Basis\Nats\Configuration;

class NatsService
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client(
            new Configuration(
                host: env('NATS_HOST', '127.0.0.1'),
                port: (int) env('NATS_PORT', 4222),
            )
        );
    }

    public function publish(string $subject, array $payload): void
    {
        $this->client->publish(
            $subject,
            json_encode($payload)
        );
    }
}