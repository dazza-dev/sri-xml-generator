<?php

namespace DazzaDev\SriXmlGenerator\Models\Tax;

use DazzaDev\SriXmlGenerator\Models\BaseModel;

class TaxPercentage extends BaseModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
