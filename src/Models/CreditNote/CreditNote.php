<?php

namespace DazzaDev\SriXmlGenerator\Models\CreditNote;

use DazzaDev\SriXmlGenerator\Models\Document;

class CreditNote extends Document
{
    /**
     * CreditNote constructor
     */
    public function __construct(
        int $environmentCode = 1,
        string $accessKey = '',
        array $data = []
    ) {
        // Document type for Credit Note
        $this->setDocumentType('04');

        // Initialize credit note data
        if (! empty($accessKey) && ! empty($data)) {
            parent::__construct($environmentCode, $accessKey, $data);
            $this->setReferencedDocument($data['referenced_document']);
        }
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'referenced_document' => $this->getReferencedDocument()->toArray(),
        ]);
    }
}
