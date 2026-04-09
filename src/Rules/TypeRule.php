<?php

declare(strict_types=1);

namespace Vencelg\EnvKeeper\Rules;

use Vencelg\EnvKeeper\Rules\Base\Rule;
use Vencelg\EnvKeeper\Rules\Enums\Type;

class TypeRule extends Rule
{
    private const string KEY = 'type';

    public function __construct(mixed $value)
    {
        parent::__construct($value);
    }

    public static function key(): string
    {
        return self::KEY;
    }

    public function check(): bool
    {
        return Type::tryFrom($this->value) !== null;
    }

    public function validate(mixed $envValue): bool
    {
        return Type::from($this->value)->checkForType($envValue) ?? false;
    }
}
