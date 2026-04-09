<?php

declare(strict_types=1);

namespace Vencelg\EnvKeeper\Rules;

use Exception;
use Vencelg\EnvKeeper\Rules\Base\Rule;

class EnumRule extends Rule
{
    private const string KEY = 'enum';

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
        if (!is_array($this->value) || empty($this->value)) {
            throw new Exception('Invalid value for rule ' . static::key() . '. Expected a non-empty array, got ' . gettype($this->value));
        }

        return true;
    }

    public function validate(mixed $envValue): bool
    {
        return in_array($envValue, $this->value);
    }
}