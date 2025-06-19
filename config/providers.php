<?php
return [
    'gpt' => [
        'api_key' => env('AIREWRITER_GPT_KEY'),
        'endpoint' => 'https://api.openai.com/v1/engines/gpt-4/completions',
    ],
    'claude' => [
        'api_key' => env('AIREWRITER_CLAUDE_KEY'),
        'endpoint' => 'https://api.anthropic.com/v1/complete',
    ],
    'cline' => [
        'api_key' => env('AIREWRITER_CLINE_KEY'),
        'endpoint' => 'https://api.cline.com/v1/rewrite',
    ],
    'gemini' => [
        'api_key' => env('AIREWRITER_GEMINI_KEY'),
        'endpoint' => 'https://api.gemini.com/v1/rewrite',
    ],
    'openai' => [
        'api_key' => env('AIREWRITER_OPENAI_KEY'),
        'endpoint' => 'https://api.openai.com/v1/completions',
    ],
];
