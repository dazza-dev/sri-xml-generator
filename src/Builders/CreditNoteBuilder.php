<?php

namespace DazzaDev\SriXmlGenerator\Builders;

use DazzaDev\SriXmlGenerator\Models\CreditNote\CreditNote;

class CreditNoteBuilder extends BaseDocumentBuilder
{
    /**
     * Create document instance
     */
    protected function createDocument(): CreditNote
    {
        return new CreditNote($this->environmentCode, $this->accessKey, $this->documentData);
    }

    /**
     * Get document type for credit note
     */
    protected function getDocumentType(): string
    {
        return 'credit-note';
    }

    /**
     * Get the credit note instance
     */
    public function getCreditNote(): CreditNote
    {
        return $this->getDocument();
    }
}
