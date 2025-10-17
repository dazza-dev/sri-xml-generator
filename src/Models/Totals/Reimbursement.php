<?php

namespace DazzaDev\SriXmlGenerator\Models\Totals;

class Reimbursement
{
    /**
     * Reimbursement document code
     */
    public string $code;

    /**
     * Total reimbursement amount
     */
    public float $total;

    /**
     * Taxable base total for reimbursement
     */
    public float $taxableBaseTotal;

    /**
     * Tax total for reimbursement
     */
    public float $taxTotal;

    /**
     * Reimbursement constructor
     */
    public function __construct(array $data = [])
    {
        $this->initialize($data);
    }

    /**
     * Initialize reimbursement data
     */
    protected function initialize(array $data): void
    {
        if (empty($data)) {
            return;
        }

        if (isset($data['code'])) {
            $this->setCode($data['code']);
        }

        if (isset($data['total'])) {
            $this->setTotal($data['total']);
        }

        if (isset($data['taxable_base_total'])) {
            $this->setTaxableBaseTotal($data['taxable_base_total']);
        }

        if (isset($data['tax_total'])) {
            $this->setTaxTotal($data['tax_total']);
        }
    }

    /**
     * Get reimbursement document code
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Set reimbursement document code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * Get total reimbursement amount
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * Set total reimbursement amount
     */
    public function setTotal(float $total): void
    {
        $this->total = $total;
    }

    /**
     * Get taxable base total for reimbursement
     */
    public function getTaxableBaseTotal(): float
    {
        return $this->taxableBaseTotal;
    }

    /**
     * Set taxable base total for reimbursement
     */
    public function setTaxableBaseTotal(float $taxableBaseTotal): void
    {
        $this->taxableBaseTotal = $taxableBaseTotal;
    }

    /**
     * Get tax total for reimbursement
     */
    public function getTaxTotal(): float
    {
        return $this->taxTotal;
    }

    /**
     * Set tax total for reimbursement
     */
    public function setTaxTotal(float $taxTotal): void
    {
        $this->taxTotal = $taxTotal;
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return [
            'code' => $this->getCode(),
            'total' => $this->getTotal(),
            'taxable_base_total' => $this->getTaxableBaseTotal(),
            'tax_total' => $this->getTaxTotal(),
        ];
    }
}
