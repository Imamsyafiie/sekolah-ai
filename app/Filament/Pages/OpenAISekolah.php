<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use OpenAI\Laravel\Facades\OpenAI;

class OpenAISekolah extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.chatAI';

    public $responseText;

    public function generateText()
    {
        try {
            $response = OpenAI::completions()->create([
                'model' => 'gpt-3.5-turbo-instruct',
                'prompt' => 'Apa itu kecerdasan buatan?',
                'max_tokens' => 50,
            ]);

            $this->responseText = $response['choices'][0]['text'];
        } catch (\Exception $e) {
            $this->responseText = "Terjadi kesalahan: " . $e->getMessage();
        }
    }
}
