<?php

namespace DazzaDev\SriXmlGenerator\Models\DebitNote;

use DazzaDev\SriXmlGenerator\Models\Document;
use DazzaDev\SriXmlGenerator\Models\Reason;

class DebitNote extends Document
{
    /**
     * Reasons information
     *
     * @var Reason[]
     */
    private array $reasons = [];

    /**
     * DebitNote constructor
     */
    public function __construct(
        int $environmentCode = 1,
        string $accessKey = '',
        array $data = []
    ) {
        // Document type for Debit Note
        $this->setDocumentType('05');

        // Initialize debit note data
        if (! empty($accessKey) && ! empty($data)) {
            parent::__construct($environmentCode, $accessKey, $data);
            $this->setReferencedDocument($data['referenced_document']);

            if (isset($data['reasons'])) {
                $this->setReasons($data['reasons']);
            }
        }
    }

    /**
     * Get reasons
     *
     * @return Reason[]
     */
    public function getReasons(): array
    {
        return $this->reasons;
    }

    /**
     * Set reasons
     */
    public function setReasons(array $reasons): void
    {
        $this->reasons = [];
        foreach ($reasons as $reason) {
            $this->addReason($reason);
        }
    }

    /**
     * Add reason item
     */
    public function addReason(array|Reason $reason): void
    {
        $this->reasons[] = $reason instanceof Reason ? $reason : new Reason($reason);
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'referenced_document' => $this->getReferencedDocument()?->toArray(),
            'reasons' => array_map(fn (Reason $reason) => $reason->toArray(), $this->reasons),
        ]);
    }
}
