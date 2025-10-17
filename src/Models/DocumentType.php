<?php

namespace DazzaDev\SriXmlGenerator\Models;

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
