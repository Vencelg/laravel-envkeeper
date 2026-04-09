<?php

declare(strict_types=1);

namespace Vencelg\EnvKeeper\Rules\Enums;

enum Type: string
{
    case STRING = 'string';
    case INTEGER = 'integer';
    case FLOAT = 'float';
    case BOOLEAN = 'boolean';

    public function checkForType(mixed $envValue): bool
    {
        return match ($this) {
            self::STRING => is_string($envValue),
            self::INTEGER => ctype_digit($envValue),
            self::FLOAT => is_numeric($envValue),
            self::BOOLEAN => in_array(strtolower($envValue), ['true', 'false', '1', '0']),
        };
    }
}
