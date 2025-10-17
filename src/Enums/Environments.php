<?php

namespace DazzaDev\SriXmlGenerator\Enums;

enum Environments: int
{
    case TEST = 1;
    case PRODUCTION = 2;

    /**
     * Returns the display name for the environment
     */
    public function name(): string
    {
        return match ($this) {
            self::TEST => 'Pruebas',
            self::PRODUCTION => 'Producción',
        };
    }

    /**
     * Get the environment as an array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name(),
            'code' => $this->value,
        ];
    }

    /**
     * Get all environments as an array with their details
     */
    public static function getEnvironments(): array
    {
        return array_reduce(self::cases(), function ($carry, self $case) {
            $carry[$case->value] = [
                'label' => $case->name(),
                'code' => $case->value,
            ];

            return $carry;
        }, []);
    }

    /**
     * Check if environment is test
     */
    public function isTest(): bool
    {
        return $this === self::TEST;
    }

    /**
     * Check if environment is production
     */
    public function isProduction(): bool
    {
        return $this === self::PRODUCTION;
    }
}
