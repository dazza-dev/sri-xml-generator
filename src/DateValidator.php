<?php

namespace DazzaDev\SriXmlGenerator;

use Exception;

class DateValidator
{
    /**
     * Validate if a string is a valid date in Y-m-d format.
     */
    public function isValidDateFormat(string $date): bool
    {
        if (! preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            return false;
        }

        $parts = explode('-', $date);

        return checkdate((int) $parts[1], (int) $parts[2], (int) $parts[0]);
    }

    /**
     * Validate or convert the date to the America/Bogota timezone.
     * Date must be in ISO 8601 format.
     *
     * @throws Exception If date is not in ISO 8601 format
     */
    public function validate(string $date): string
    {
        // Validate ISO 8601 format
        if (! preg_match('/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}(?:\.\d+)?(?:Z|[+-]\d{2}:?\d{2})?$/', $date)) {
            throw new Exception('Date must be in ISO 8601 format (e.g. 2025-12-31T23:59:59Z) but got: ' . $date);
        }

        return $date;
    }

    /**
     * Get date in d/m/Y format
     */
    public function getDate(string $date): string
    {
        return $this->validate($date);
    }
}
