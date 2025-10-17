<?php

namespace DazzaDev\SriXmlGenerator\Models;

class Establishment extends BaseModel
{
    /**
     * Address
     */
    private string $address;

    /**
     * Customer constructor
     */
    public function __construct(array $data = [])
    {
        parent::initialize($data);

        $this->setAddress($data['address']);
    }

    /**
     * Get address
     */
    public function getAddress(): string
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
     * Get array representation
     */
    public function toArray(): array
    {
        return array_merge($this->getBaseArray(), [
            'address' => $this->getAddress(),
        ]);
    }
}
