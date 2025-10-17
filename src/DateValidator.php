<?php

namespace DazzaDev\SriXmlGenerator;

use DateTime;
use Exception;

class DateValidator
{
    /**
     * Validate or convert the date to the America/Bogota timezone.
     * Date must be in Y-m-d format.
     *
     * @throws Exception If date is not in Y-m-d format
     */
    public function validate(string|DateTime $date): DateTime
    {
        // Check if date is already a DateTime object
        if ($date instanceof DateTime) {
            return $date;
        }

        // Validate Y-m-d format
        if (! $this->isValidDateFormat($date)) {
            throw new Exception('Date must be in Y-m-d format (e.g. 2025-12-31) but got: '.$date);
        }

        $dateObject = new DateTime($date);

        return $dateObject;
    }

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
     * Get date in d/m/Y format
     */
    public function getDate(string|DateTime $date): string
    {
        $dateObject = $this->validate($date);

        return $dateObject->format('d/m/Y');
    }

    /**
     * Get time in H:i:s%z format
     */
    public function getTime(string|DateTime $date): string
    {
        $dateObject = $this->validate($date);

        return $dateObject->format('H:i:sP');
    }

    /**
     * Get DateTime object
     */
    public function getDateTime(string|DateTime $date): string
    {
        return $this->validate($date)->format('d/m/Y H:i:sP');
    }
}
