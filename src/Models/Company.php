<?php

namespace DazzaDev\SriXmlGenerator\Models;

class Company
{
    /**
     * Company identification number (RUC)
     */
    public string $identificationNumber;

    /**
     * Legal name of the company
     */
    public string $legalName;

    /**
     * Trade name of the company
     */
    public string $tradeName;

    /**
     * Head office address of the company
     */
    public string $headOfficeAddress;

    /**
     * Establishment information
     */
    public Establishment $establishment;

    /**
     * Emission point information
     */
    public EmissionPoint $emissionPoint;

    /**
     * RIMPE regime taxpayer information
     */
    public ?RimpeRegime $rimpeRegimeTaxpayer = null;

    /**
     * Special taxpayer number (Contribuyente Especial)
     */
    public ?string $specialTaxpayerNumber = null;

    /**
     * Whether the company is a withholding agent (Agente de retención)
     */
    public bool $withholdingAgent = false;

    /**
     * Whether the company is required to keep accounting (obligado a llevar contabilidad)
     */
    public bool $requiresAccounting = false;

    /**
     * Constructor to initialize the Company model
     */
    public function __construct(array $data)
    {
        $this->initialize($data);
    }

    /**
     * Convert the Company instance to array
     */
    public function toArray(): array
    {
        return [
            'identification_number' => $this->identificationNumber,
            'legal_name' => $this->legalName,
            'trade_name' => $this->tradeName,
            'head_office_address' => $this->headOfficeAddress,
            'establishment' => $this->establishment->toArray(),
            'emission_point' => $this->emissionPoint->toArray(),
            'rimpe_regime_taxpayer' => $this->rimpeRegimeTaxpayer?->toArray(),
            'special_taxpayer_number' => $this->specialTaxpayerNumber,
            'withholding_agent' => $this->withholdingAgent,
            'requires_accounting' => $this->requiresAccounting,
        ];
    }
}
