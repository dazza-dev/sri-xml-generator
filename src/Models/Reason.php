<?php

namespace DazzaDev\SriXmlGenerator\Models;

class Reason
{
    /**
     * Reason description
     */
    private string $reason = '';

    /**
     * Reason amount
     */
    private float $amount = 0.0;

    /**
     * Reason constructor
     */
    public function __construct(array $data = [])
    {
        $this->initialize($data);
    }

    /**
     * Initialize model data
     */
    protected function initialize(array $data): void
    {
        if (empty($data)) {
            return;
        }

        if (isset($data['reason'])) {
            $this->setReason($data['reason']);
        }

        if (isset($data['amount'])) {
            $this->setAmount($data['amount']);
        }
    }

    /**
     * Get reason description
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * Set reason description
     */
    public function setReason(string $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * Get reason amount
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * Set reason amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return [
            'reason' => $this->getReason(),
            'amount' => $this->getAmount(),
        ];
    }
}
