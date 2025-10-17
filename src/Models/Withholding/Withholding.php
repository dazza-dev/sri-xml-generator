<?php

namespace DazzaDev\SriXmlGenerator\Models\Withholding;

use DazzaDev\SriXmlGenerator\DataLoader;

class Withholding
{
    /**
     * Withholding type
     */
    public WithholdingType $withholdingType;

    /**
     * Withholding percentage code
     */
    public string $percentageCode;

    /**
     * Withholding rate
     */
    public float $rate;

    /**
     * Withholding value amount
     */
    public float $value;

    /**
     * Withholding constructor
     */
    public function __construct(array $data = [])
    {
        $this->initialize($data);
    }

    /**
     * Initialize withholding data
     */
    protected function initialize(array $data): void
    {
        if (empty($data)) {
            return;
        }

        if (isset($data['code'])) {
            $this->setWithholdingType($data['code']);
        }

        if (isset($data['percentage_code'])) {
            $this->setPercentageCode($data['percentage_code']);
        }

        if (isset($data['rate'])) {
            $this->setRate($data['rate']);
        }

        if (isset($data['value'])) {
            $this->setValue($data['value']);
        }
    }

    /**
     * Get withholding type
     */
    public function getWithholdingType(): WithholdingType
    {
        return $this->withholdingType;
    }

    /**
     * Set withholding type
     */
    public function setWithholdingType(int|string $withholdingTypeCode): void
    {
        $withholdingType = (new DataLoader('withholding-types'))->getByCode($withholdingTypeCode);

        $this->withholdingType = new WithholdingType($withholdingType);
    }

    /**
     * Get withholding percentage code
     */
    public function getPercentageCode(): string
    {
        return $this->percentageCode;
    }

    /**
     * Set withholding percentage code
     */
    public function setPercentageCode(string $percentageCode): void
    {
        $this->percentageCode = $percentageCode;
    }

    /**
     * Get withholding rate
     */
    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * Set withholding rate
     */
    public function setRate(float $rate): void
    {
        $this->rate = $rate;
    }

    /**
     * Get withholding value amount
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * Set withholding value amount
     */
    public function setValue(float $value): void
    {
        $this->value = $value;
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return [
            'withholding_type' => $this->getWithholdingType()->toArray(),
            'percentage_code' => $this->getPercentageCode(),
            'rate' => $this->getRate(),
            'value' => $this->getValue(),
        ];
    }
}
