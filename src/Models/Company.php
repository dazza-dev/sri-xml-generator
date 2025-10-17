<?php

namespace DazzaDev\SriXmlGenerator\Models;

use DazzaDev\SriXmlGenerator\DataLoader;

class Company
{
    /**
     * Company identification number (RUC)
     */
    public string $ruc;

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

        $this->setRuc($data['ruc']);
        $this->setLegalName($data['legal_name']);
        $this->setTradeName($data['trade_name'] ?? '');
        $this->setHeadOfficeAddress($data['head_office_address']);

        // RIMPE Regime Taxpayer
        if (isset($data['rimpe_regime_taxpayer'])) {
            $this->setRimpeRegimeTaxpayer($data['rimpe_regime_taxpayer']);
        }

        // Special Taxpayer Number
        if (isset($data['special_taxpayer_number'])) {
            $this->setSpecialTaxpayerNumber($data['special_taxpayer_number']);
        }

        // Withholding Agent
        if (isset($data['withholding_agent'])) {
            $this->setWithholdingAgent($data['withholding_agent']);
        }

        // Requires Accounting
        if (isset($data['requires_accounting'])) {
            $this->setRequiresAccounting($data['requires_accounting']);
        }
    }

    /**
     * Get RUC
     */
    public function getRuc(): string
    {
        return $this->ruc;
    }

    /**
     * Set RUC
     */
    public function setRuc(string $ruc): void
    {
        $this->ruc = $ruc;
    }

    /**
     * Get legal name
     */
    public function getLegalName(): string
    {
        return $this->legalName;
    }

    /**
     * Set legal name
     */
    public function setLegalName(string $legalName): void
    {
        $this->legalName = $legalName;
    }

    /**
     * Get trade name
     */
    public function getTradeName(): string
    {
        return $this->tradeName;
    }

    /**
     * Set trade name
     */
    public function setTradeName(string $tradeName): void
    {
        $this->tradeName = $tradeName;
    }

    /**
     * Get head office address
     */
    public function getHeadOfficeAddress(): string
    {
        return $this->headOfficeAddress;
    }

    /**
     * Set head office address
     */
    public function setHeadOfficeAddress(string $headOfficeAddress): void
    {
        $this->headOfficeAddress = $headOfficeAddress;
    }

    /**
     * Get RIMPE regime taxpayer
     */
    public function getRimpeRegimeTaxpayer(): ?RimpeRegime
    {
        return $this->rimpeRegimeTaxpayer;
    }

    /**
     * Set RIMPE regime taxpayer
     */
    public function setRimpeRegimeTaxpayer(string $rimpeRegimeTaxpayer): void
    {
        $rimpeRegime = (new DataLoader('rimpe-regimes'))->getByCode($rimpeRegimeTaxpayer);

        $this->rimpeRegimeTaxpayer = new RimpeRegime($rimpeRegime);
    }

    /**
     * Get special taxpayer number
     */
    public function getSpecialTaxpayerNumber(): ?string
    {
        return $this->specialTaxpayerNumber;
    }

    /**
     * Set special taxpayer number
     */
    public function setSpecialTaxpayerNumber(string $specialTaxpayerNumber): void
    {
        $this->specialTaxpayerNumber = $specialTaxpayerNumber;
    }

    /**
     * Get whether the company is a withholding agent
     */
    public function isWithholdingAgent(): bool
    {
        return $this->withholdingAgent;
    }

    /**
     * Set whether the company is a withholding agent
     */
    public function setWithholdingAgent(bool $withholdingAgent): void
    {
        $this->withholdingAgent = $withholdingAgent;
    }

    /**
     * Get whether the company is required to keep accounting
     */
    public function requiresAccounting(): bool
    {
        return $this->requiresAccounting;
    }

    /**
     * Set whether the company is required to keep accounting
     */
    public function setRequiresAccounting(bool $requiresAccounting): void
    {
        $this->requiresAccounting = $requiresAccounting;
    }

    /**
     * Convert the Company instance to array
     */
    public function toArray(): array
    {
        return [
            'ruc' => $this->ruc,
            'legal_name' => $this->legalName,
            'trade_name' => $this->tradeName,
            'head_office_address' => $this->headOfficeAddress,
            'rimpe_regime_taxpayer' => $this->rimpeRegimeTaxpayer?->toArray(),
            'special_taxpayer_number' => $this->specialTaxpayerNumber,
            'withholding_agent' => $this->withholdingAgent,
            'requires_accounting' => $this->requiresAccounting,
        ];
    }
}
