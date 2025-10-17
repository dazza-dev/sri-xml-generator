<?php

namespace DazzaDev\SriXmlGenerator\Models;

use DazzaDev\SriXmlGenerator\DataLoader;
use DazzaDev\SriXmlGenerator\DateValidator;
use DazzaDev\SriXmlGenerator\Enums\Environments;
use DazzaDev\SriXmlGenerator\Models\Document\AdditionalInfo;
use DazzaDev\SriXmlGenerator\Models\Document\LineItem;
use DazzaDev\SriXmlGenerator\Models\Payment\Payment;
use DazzaDev\SriXmlGenerator\Models\Totals\Totals;

class Document
{
    /**
     * Environment
     */
    private array $environment;

    /**
     * Document type
     */
    private DocumentType $documentType;

    /**
     * Access key
     */
    private string $accessKey;

    /**
     * Sequential number
     */
    private string $sequential;

    /**
     * Date of the document
     */
    private string $date;

    /**
     * Establishment information
     */
    public Establishment $establishment;

    /**
     * Emission point information
     */
    public EmissionPoint $emissionPoint;

    /**
     * Customer information
     */
    private Customer $customer;

    /**
     * Company information
     */
    private Company $company;

    /**
     * Additional information
     *
     * @var AdditionalInfo[]
     */
    private array $additionalInfo = [];

    /**
     * Line items information
     *
     * @var LineItem[]
     */
    private array $lineItems = [];

    /**
     * Payments information
     *
     * @var Payment[]
     */
    private array $payments = [];

    /**
     * Totals information
     */
    private Totals $totals;

    /**
     * Referenced document information
     */
    private ?ReferencedDocument $referencedDocument = null;

    /**
     * Document constructor
     *
     * @param  array  $data  Document data
     */
    public function __construct(int $environmentCode, string $accessKey, array $data)
    {
        $this->setEnvironment(Environments::from($environmentCode));
        $this->setAccessKey($accessKey);
        $this->initialize($data);
    }

    /**
     * Initialize document data
     *
     * @param  array  $data  Document data
     */
    private function initialize(array $data): void
    {
        if (empty($data)) {
            return;
        }

        // Sequential
        $this->setSequential($data['sequential']);

        // Date
        $this->setDate($data['date']);

        // Establishment
        $this->setEstablishment(new Establishment($data['establishment']));

        // Emission Point
        $this->setEmissionPoint(new EmissionPoint($data['emission_point']));

        // Company
        $this->setCompany($data['company']);

        // Customer
        $this->setCustomer($data['customer']);

        // Additional info
        if (isset($data['additional_info'])) {
            $this->setAdditionalInfo($data['additional_info']);
        }

        // Line items
        if (isset($data['line_items'])) {
            $this->setLineItems($data['line_items']);
        }

        // Payments
        if (isset($data['payments'])) {
            $this->setPayments($data['payments']);
        }

        // Totals
        if (isset($data['totals'])) {
            $this->setTotals($data['totals']);
        }
    }

    /**
     * Set access key
     */
    public function setAccessKey(string $accessKey): void
    {
        $this->accessKey = $accessKey;
    }

    /**
     * Get access key
     */
    public function getAccessKey(): string
    {
        return $this->accessKey;
    }

    /**
     * Set environment
     */
    public function setEnvironment(Environments $environment): void
    {
        $this->environment = $environment->toArray();
    }

    /**
     * Get environment
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

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

    /**
     * Get number
     */
    public function getSequential(): string
    {
        return $this->sequential;
    }

    /**
     * Set sequential
     */
    public function setSequential(string $sequential): void
    {
        $this->sequential = $sequential;
    }

    /**
     * Get document number
     */
    public function getDocumentNumber(): string
    {
        $establishment = $this->getEstablishment()->getCode();
        $emissionPoint = $this->getEmissionPoint()->getCode();
        $sequential = $this->getSequential();

        return $establishment.'-'.$emissionPoint.'-'.$sequential;
    }

    /**
     * Set date
     */
    public function setDate(string $date): void
    {
        $dateValidator = new DateValidator;

        $this->date = $dateValidator->getDate($date);
    }

    /**
     * Get date
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * Get establishment
     */
    public function getEstablishment(): Establishment
    {
        return $this->establishment;
    }

    /**
     * Set establishment
     */
    public function setEstablishment(Establishment $establishment): void
    {
        $this->establishment = $establishment;
    }

    /**
     * Get emission point
     */
    public function getEmissionPoint(): EmissionPoint
    {
        return $this->emissionPoint;
    }

    /**
     * Set emission point
     */
    public function setEmissionPoint(EmissionPoint $emissionPoint): void
    {
        $this->emissionPoint = $emissionPoint;
    }

    /**
     * Get customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * Set customer
     */
    public function setCustomer(array|Customer $customer): void
    {
        $this->customer = $customer instanceof Customer ? $customer : new Customer($customer);
    }

    /**
     * Get company
     */
    public function getCompany(): Company
    {
        return $this->company;
    }

    /**
     * Set company
     */
    public function setCompany(array|Company $company): void
    {
        $this->company = $company instanceof Company ? $company : new Company($company);
    }

    /**
     * Get additional info
     *
     * @return AdditionalInfo[]
     */
    public function getAdditionalInfo(): array
    {
        return $this->additionalInfo;
    }

    /**
     * Set additional info
     */
    public function setAdditionalInfo(array $additionalInfo): void
    {
        $this->additionalInfo = [];
        foreach ($additionalInfo as $info) {
            $this->addAdditionalInfo($info);
        }
    }

    /**
     * Add additional info item
     */
    public function addAdditionalInfo(array|AdditionalInfo $info): void
    {
        $this->additionalInfo[] = $info instanceof AdditionalInfo ? $info : new AdditionalInfo($info);
    }

    /**
     * Get line items
     *
     * @return LineItem[]
     */
    public function getLineItems(): array
    {
        return $this->lineItems;
    }

    /**
     * Set line items
     */
    public function setLineItems(array $lineItems): void
    {
        $this->lineItems = [];
        foreach ($lineItems as $lineItem) {
            $this->addLineItem($lineItem);
        }
    }

    /**
     * Add line item
     */
    public function addLineItem(array|LineItem $lineItem): void
    {
        $this->lineItems[] = $lineItem instanceof LineItem ? $lineItem : new LineItem($lineItem);
    }

    /**
     * Get payments
     *
     * @return Payment[]
     */
    public function getPayments(): array
    {
        return $this->payments;
    }

    /**
     * Set payments
     */
    public function setPayments(array $payments): void
    {
        $this->payments = [];
        foreach ($payments as $payment) {
            $this->addPayment($payment);
        }
    }

    /**
     * Add payment item
     */
    public function addPayment(array|Payment $payment): void
    {
        $this->payments[] = $payment instanceof Payment ? $payment : new Payment($payment);
    }

    /**
     * Get totals
     */
    public function getTotals(): Totals
    {
        return $this->totals;
    }

    /**
     * Set totals
     */
    public function setTotals(array|Totals $totals): void
    {
        $this->totals = $totals instanceof Totals ? $totals : new Totals($totals);
    }

    /**
     * Get referenced document
     */
    public function getReferencedDocument(): ?ReferencedDocument
    {
        return $this->referencedDocument;
    }

    /**
     * Set referenced document
     */
    public function setReferencedDocument(array|ReferencedDocument $referencedDocument): void
    {
        $this->referencedDocument = $referencedDocument instanceof ReferencedDocument ? $referencedDocument : new ReferencedDocument($referencedDocument);
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return [
            'environment' => $this->getEnvironment(),
            'document_type' => $this->getDocumentType()->toArray(),
            'access_key' => $this->getAccessKey(),
            'sequential' => $this->getSequential(),
            'date' => $this->getDate(),
            'establishment' => $this->getEstablishment()->toArray(),
            'emission_point' => $this->getEmissionPoint()->toArray(),
            'customer' => $this->getCustomer()->toArray(),
            'company' => $this->getCompany()->toArray(),
            'additional_info' => array_map(fn (AdditionalInfo $info) => $info->toArray(), $this->getAdditionalInfo()),
            'line_items' => array_map(fn (LineItem $lineItem) => $lineItem->toArray(), $this->getLineItems()),
            'payments' => array_map(fn (Payment $payment) => $payment->toArray(), $this->getPayments()),
            'totals' => $this->getTotals()->toArray(),
        ];
    }
}
