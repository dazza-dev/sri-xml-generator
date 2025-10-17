<?php

namespace DazzaDev\SriXmlGenerator\Models;

use DazzaDev\SriXmlGenerator\DataLoader;
use DazzaDev\SriXmlGenerator\DateValidator;

class ReferencedDocument
{
    /**
     * Document type
     */
    private DocumentType $documentType;

    /**
     * Document number
     */
    private string $documentNumber;

    /**
     * Emission date
     */
    private string $emissionDate;

    /**
     * Reason for the modification
     */
    private ?string $reason = null;

    /**
     * ReferencedDocument constructor
     */
    public function __construct(array $data = [])
    {
        $this->initialize($data);
    }

    /**
     * Initialize referenced document data
     */
    private function initialize(array $data): void
    {
        if (empty($data)) {
            return;
        }

        // Set document type
        $this->setDocumentType($data['document_type']);

        // Set document number
        $this->setDocumentNumber($data['number']);

        // Set emission date
        $this->setEmissionDate($data['emission_date']);

        // Set reason
        if (isset($data['reason'])) {
            $this->setReason($data['reason']);
        }
    }

    /**
     * Get document type
     */
    public function getDocumentType(): DocumentType
    {
        return $this->documentType;
    }

    /**
     * Set document type
     */
    public function setDocumentType(string $documentTypeCode): void
    {
        $documentType = (new DataLoader('document-types'))->getByCode($documentTypeCode);

        $this->documentType = new DocumentType($documentType);
    }

    /**
     * Get document number
     */
    public function getDocumentNumber(): string
    {
        return $this->documentNumber;
    }

    /**
     * Set document number
     */
    public function setDocumentNumber(string $documentNumber): void
    {
        $this->documentNumber = $documentNumber;
    }

    /**
     * Get emission date
     */
    public function getEmissionDate(): string
    {
        return $this->emissionDate;
    }

    /**
     * Set emission date
     */
    public function setEmissionDate(string $emissionDate): void
    {
        $dateValidator = new DateValidator;

        $this->emissionDate = $dateValidator->getDate($emissionDate);
    }

    /**
     * Get reason
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * Set reason
     */
    public function setReason(string $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * Convert referenced document to array
     */
    public function toArray(): array
    {
        return [
            'document_type' => $this->getDocumentType()->toArray(),
            'number' => $this->getDocumentNumber(),
            'emission_date' => $this->getEmissionDate(),
            'reason' => $this->getReason(),
        ];
    }
}
