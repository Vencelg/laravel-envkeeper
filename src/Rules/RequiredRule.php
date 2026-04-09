<?php

declare(strict_types=1);

namespace Vencelg\EnvKeeper\Rules;

use Exception;
use Vencelg\EnvKeeper\Rules\Base\Rule;

class RequiredRule extends Rule
{
    public const KEY = 'required';

    /**
     * @throws Exception
     */
    public function __construct(mixed $value)
    {
        parent::__construct($value);
        $this->check();
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
        if (!is_bool($this->value)) {
            throw new Exception('Invalid value for rule ' . static::key() . '. Expected boolean, got ' . gettype($this->value));
        }

        return true;
    }

    public function validate(mixed $envValue): bool
    {
        return null !== $envValue && '' !== $envValue;
    }
}
