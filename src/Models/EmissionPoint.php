<?php

namespace DazzaDev\SriXmlGenerator\Models;

class EmissionPoint extends BaseModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
