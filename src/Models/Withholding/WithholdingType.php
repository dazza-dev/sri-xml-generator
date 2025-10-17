<?php

namespace DazzaDev\SriXmlGenerator\Models\Withholding;

use DazzaDev\SriXmlGenerator\Models\BaseModel;

class WithholdingType extends BaseModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
