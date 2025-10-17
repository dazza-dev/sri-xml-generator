<?php

namespace DazzaDev\SriXmlGenerator\Builders;

use DazzaDev\SriXmlGenerator\Models\WithholdingReceipt\WithholdingReceipt;

class WithholdingReceiptBuilder extends BaseDocumentBuilder
{
    /**
     * Create document instance
     */
    protected function createDocument(): WithholdingReceipt
    {
        return new WithholdingReceipt($this->environmentCode, $this->accessKey, $this->documentData);
    }

    /**
     * Get document type for withholding receipt
     */
    protected function getDocumentType(): string
    {
        return 'withholding-receipt';
    }

    /**
     * Get the withholding receipt instance
     */
    public function getWithholdingReceipt(): WithholdingReceipt
    {
        return $this->getDocument();
    }
}
