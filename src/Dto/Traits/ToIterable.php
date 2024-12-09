<?php

declare(strict_types=1);

namespace CodebarAg\LaravelPWA\Dto\Traits;

use BackedEnum;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionProperty;

trait ToIterable
{
    public function toArray(): array
    {
        $reflection = new ReflectionClass($this);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);

        $array = [];
        foreach ($properties as $property) {
            $value = $property->getValue($this);

            // Default conversions
            if ($value instanceof BackedEnum) {
                $value = $value->value;
            }

            // Custom conversions
            if (method_exists($this, 'convertInstances')) {
                $value = $this->convertInstances($value);
            }

            $array[Str::snake($property->getName())] = $value;
        }

        return $array;
    }

    public function toCollection(): Collection
    {
        return new Collection($this->toArray());
    }
}
