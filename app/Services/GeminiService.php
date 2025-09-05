<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GeminiService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('GEMINI_API_KEY');
    }

    public function prompt(string $texto): string
    {
        $response = Http::post(
            "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=" . $this->apiKey,
            [
                'contents' => [[
                    'parts' => [['text' => $texto]]
                ]]
            ]
        );

        $data = $response->json();

        return $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Sin respuesta';
    }
}