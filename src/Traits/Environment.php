<?php

namespace DazzaDev\SriXmlGenerator\Traits;

use DazzaDev\SriXmlGenerator\Enums\Environments;

trait Environment
{
    private array $environment;

    /**
     * Set environment
     */
    public function setEnvironment(Environments $environment): void
    {
        $this->environment = $environment->toArray();
    }

    /**
     * Get environment
     */
    public function getEnvironment()
    {
        return $this->environment;
    }
}
