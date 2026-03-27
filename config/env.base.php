<?php

declare(strict_types=1);

return [
    'APP_KEY' => ['required' => true],
    'APP_ENV' => ['required' => true, 'allowed' => ['local', 'production', 'staging']],
];
