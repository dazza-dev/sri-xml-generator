<?php

namespace DazzaDev\SriXmlGenerator\Models\DeliveryGuide;

use DazzaDev\SriXmlGenerator\Models\Document;

class DeliveryGuide extends Document
{
    /**
     * DeliveryGuide constructor
     */
    public function __construct(
        int $environmentCode = 1,
        string $accessKey = '',
        array $data = []
    ) {
        // Document type for Delivery Guide (Guía de remisión)
        $this->setDocumentType('06');

        // Initialize delivery guide data
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
