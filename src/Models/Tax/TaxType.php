<?php

namespace DazzaDev\SriXmlGenerator\Models\Tax;

use DazzaDev\SriXmlGenerator\Models\BaseModel;

class TaxType extends BaseModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
