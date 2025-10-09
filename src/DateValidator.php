<?php

namespace DazzaDev\SriXmlGenerator;

use Exception;

class DateValidator
{
    /**
     * Validate if a string is a valid date in d/m/Y format.
     */
    public function isValidDateFormat(string $date): bool
    {
        if (! preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $date)) {
            return false;
        }

        $parts = explode('/', $date);

        return checkdate((int) $parts[1], (int) $parts[0], (int) $parts[2]);
    }

    /**
     * Validate date in d/m/Y format (e.g., 21/10/2012).
     *
     * @throws Exception If date is not in d/m/Y format or is invalid
     */
    public function validate(string $date): string
    {
        // Validate d/m/Y format
        if (! preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $date)) {
            throw new Exception('Date must be in d/m/Y format (e.g. 21/10/2012) but got: ' . $date);
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
