<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TermiiSmsService
{
    public function send(string $phone, string $message): array
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(
            'https://api.ng.termii.com/api/sms/send',
            [
                'to' => $phone,
                'from' => 'null',
                'sms' => $message,
                'type' => 'plain',
                'channel' => 'generic',
                'api_key' => config('services.termii.api_key'),
            ]
        );

        if ($response->failed()) {
            throw new \Exception(
                'Termii SMS failed: ' . $response->body()
            );
        }

        return $response->json();
    }
}