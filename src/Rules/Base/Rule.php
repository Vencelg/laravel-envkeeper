<?php

declare(strict_types=1);

namespace Vencelg\EnvKeeper\Rules\Base;

abstract class Rule
{
    public function __construct(protected mixed $value) {}

    abstract public static function key(): string;

    abstract public function check(): bool;

    abstract public function validate(mixed $envValue): bool;
}
