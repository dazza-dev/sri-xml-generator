<?php

namespace DazzaDev\SriXmlGenerator\Models;

use DazzaDev\SriXmlGenerator\Models\BaseModel;

class IdentificationType extends BaseModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
