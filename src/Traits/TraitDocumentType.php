<?php

namespace DazzaDev\SriXmlGenerator\Traits;

use DazzaDev\SriXmlGenerator\DataLoader;
use DazzaDev\SriXmlGenerator\Models\DocumentType;

trait TraitDocumentType
{
    private DocumentType $documentType;

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
}
