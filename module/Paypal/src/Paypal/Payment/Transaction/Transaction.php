<?php
namespace Paypal\Payment\Transaction;

class Transaction
{

    protected $amount;

    protected $description;

    protected $itemList;

    protected $relatedResources;

    protected $invoiceNumber;

    protected $custom;

    protected $softDescriptor;

    protected $paymentOptions;

    /**
     * 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getItemList()
    {
        return $this->itemList;
    }

    public function getRelatedResources()
    {
        return $this->relatedResources;
    }

    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    public function getCustom()
    {
        return $this->custom;
    }

    public function getSoftDescriptor()
    {
        return $this->softDescriptor;
    }

    public function getPaymentOptions()
    {
        return $this->paymentOptions;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setItemList($itemList)
    {
        $this->itemList = $itemList;
    }

    public function setRelatedResources($relatedResources)
    {
        $this->relatedResources = $relatedResources;
    }

    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;
    }

    public function setCustom($custom)
    {
        $this->custom = $custom;
    }

    public function setSoftDescriptor($softDescriptor)
    {
        $this->softDescriptor = $softDescriptor;
    }

    public function setPaymentOptions($paymentOptions)
    {
        $this->paymentOptions = $paymentOptions;
    }
}
