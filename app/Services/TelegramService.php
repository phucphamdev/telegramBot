<?php

namespace App\Services;

use GuzzleHttp\Client;

class TelegramService
{
    protected $token;
    protected $baseUrl;

    public function __construct()
    {
        $this->token = env('TELEGRAM_BOT_TOKEN', '7367196924:AAGZ9BZO45Bdkijbs9IUqQ_ESzPWcL3VaTE');
        $this->baseUrl = "https://api.telegram.org/bot{$this->token}/";
    }

    public function sendMessage($chatId, $message)
    {
        $client = new Client();
        $url = $this->baseUrl . 'sendMessage';

        $response = $client->post($url, [
            'json' => [
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'HTML'
            ]
        ]);

        return json_decode($response->getBody(), true);
    }
}
