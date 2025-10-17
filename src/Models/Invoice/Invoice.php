<?php

namespace DazzaDev\SriXmlGenerator\Models\Invoice;

use DazzaDev\SriXmlGenerator\Models\Document;

class Invoice extends Document
{
    /**
     * Invoice constructor
     */
    public function __construct(
        int $environmentCode = 1,
        string $accessKey = '',
        array $data = []
    ) {
        // Document type
        $this->setDocumentType('01');

        // Initialize invoice data
        if (! empty($accessKey) && ! empty($data)) {
            parent::__construct($environmentCode, $accessKey, $data);
        }
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return parent::toArray();
    }
}
