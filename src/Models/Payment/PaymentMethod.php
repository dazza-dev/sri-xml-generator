<?php

namespace DazzaDev\SriXmlGenerator\Models\Payment;

use DazzaDev\SriXmlGenerator\Models\BaseModel;

class PaymentMethod extends BaseModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
