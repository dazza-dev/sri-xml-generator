<?php

namespace DazzaDev\SriXmlGenerator\Models\WithholdingReceipt;

use DazzaDev\SriXmlGenerator\Models\Document;

class WithholdingReceipt extends Document
{
    /**
     * WithholdingReceipt constructor
     */
    public function __construct(
        int $environmentCode = 1,
        string $accessKey = '',
        array $data = []
    ) {
        // Document type for Withholding Receipt (Comprobante de retención)
        $this->setDocumentType('07');

        // Initialize withholding receipt data
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
