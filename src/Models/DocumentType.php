<?php

namespace DazzaDev\SriXmlGenerator\Models;

use DazzaDev\SriXmlGenerator\Models\BaseModel;

class DocumentType extends BaseModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
