<?php

namespace DazzaDev\SriXmlGenerator\Models;

use DateTime;
use DazzaDev\SriXmlGenerator\DataLoader;
use DazzaDev\SriXmlGenerator\DateValidator;
use DazzaDev\SriXmlGenerator\Enums\Environments;

class Document
{
    private array $environment;

    private DocumentType $documentType;

    private string $sequential;

    private string $issueDate;

    private Customer $customer;

    private Company $company;

    /**
     * Document constructor
     *
     * @param  array  $data  Document data
     */
    public function __construct(array $data = [])
    {
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

        // Environment
        $this->setEnvironment(Environments::from($data['environment']));

        // Sequential
        $this->setSequential($data['sequential']);

        // Issue date
        $this->setDate($data['date']);

        // Company
        $this->setCompany($data['company']);

        // Customer
        $this->setCustomer($data['customer']);
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
     * Set date
     */
    public function setDate(string|DateTime $date): void
    {
        $dateValidator = new DateValidator;

        $this->setIssueDate($dateValidator->getDate($date));
    }

    /**
     * Get date
     */
    public function getIssueDate(): string
    {
        return $this->issueDate;
    }

    /**
     * Set issue date
     */
    public function setIssueDate(string $issueDate): void
    {
        $this->issueDate = $issueDate;
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
     * Get array representation
     */
    public function toArray(): array
    {
        return [
            'environment' => $this->getEnvironment(),
            'document_type' => $this->getDocumentType()->toArray(),
            'sequential' => $this->getSequential(),
            'issue_date' => $this->getIssueDate(),
            'customer' => $this->getCustomer()->toArray(),
            'company' => $this->getCompany()->toArray()
        ];
    }
}
