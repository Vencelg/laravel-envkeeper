<?php

declare(strict_types=1);

namespace Vencelg\EnvKeeper\Rules;

use Exception;
use Vencelg\EnvKeeper\Rules\Base\Rule;

class RegexRule extends Rule {
    private const string KEY = 'regex';

    public function __construct(mixed $value)
    {
        parent::__construct($value);
    }

    public static function key(): string
    {
        return self::KEY;
    }

    /**
     * @throws Exception
     */
    public function check(): bool
    {
        if (!is_string($this->value) || preg_match($this->value, '') === false) {
            throw new Exception('Invalid value for rule ' . static::key() . '. Expected a valid regex pattern, got ' . gettype($this->value));
        }

        return true;
    }

    public function validate(mixed $envValue): bool
    {
        return is_string($envValue) && preg_match($this->value, $envValue) === 1;
    }
}