<?php

namespace DazzaDev\SriXmlGenerator\Models\Invoice;

use DazzaDev\SriXmlGenerator\Models\Document;

class Invoice extends Document
{
    /**
     * Invoice constructor
     */
    public function __construct(array $data = [])
    {
        // Document type
        $this->setDocumentType('01');

        // Initialize invoice data
        parent::__construct($data);
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return parent::toArray();
    }
}
