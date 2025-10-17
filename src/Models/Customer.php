<?php

namespace DazzaDev\SriXmlGenerator\Models;

use DazzaDev\SriXmlGenerator\DataLoader;

class Customer
{
    /**
     * Identification type
     */
    private IdentificationType $identificationType;

    /**
     * Identification number
     */
    private string $identificationNumber;

    /**
     * Name
     */
    private string $name;

    /**
     * Address
     */
    private ?string $address = null;

    /**
     * Customer constructor
     */
    public function __construct(array $data = [])
    {
        $this->initialize($data);
    }

    /**
     * Initialize data
     */
    private function initialize(array $data): void
    {
        if (empty($data)) {
            return;
        }

        $this->setIdentificationType($data['identification_type']);
        $this->setIdentificationNumber($data['identification_number']);
        $this->setName($data['name']);

        // Address
        if (isset($data['address'])) {
            $this->setAddress($data['address']);
        }
    }

    /**
     * Get identification type
     */
    public function getIdentificationType(): IdentificationType
    {
        return $this->identificationType;
    }

    /**
     * Set identification type
     */
    public function setIdentificationType(int|string $identificationTypeCode): void
    {
        $identificationType = (new DataLoader('identification-types'))->getByCode($identificationTypeCode);

        $this->identificationType = new IdentificationType($identificationType);
    }

    /**
     * Get identification number
     */
    public function getIdentificationNumber(): string
    {
        return $this->identificationNumber;
    }

    /**
     * Set identification number
     */
    public function setIdentificationNumber(string $identificationNumber): void
    {
        $this->identificationNumber = $identificationNumber;
    }

    /**
     * Get name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Get address
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * Set address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * To array
     */
    public function toArray(): array
    {
        return [
            'identification_type' => $this->identificationType->toArray(),
            'identification_number' => $this->identificationNumber,
            'name' => $this->name,
            'address' => $this->address,
        ];
    }
}
