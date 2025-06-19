<?php
return [
    'enabled' => env('AIREWRITER_ENABLED', true),
    'default_provider' => 'gpt',
    'supported_providers' => ['gpt', 'claude', 'cline', 'gemini', 'openai'],
    'modes' => ['creative', 'formal', 'concise'],
    'notify_roles' => ['admin', 'editor'],
    'originality_threshold' => 95,
    'clarity_threshold' => 90,
];
