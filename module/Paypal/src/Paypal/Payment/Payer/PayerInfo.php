<?php
namespace Paypal\Payment\Payer;

class PayerInfo
{

    const TAX_ID_TYPE_BR_CPF = 'BR_CPF';
    const TAX_ID_TYPE_BR_CNPJ = 'BR_CNPJ';
    
    protected $email;

    protected $salutation;

    protected $firstName;

    protected $middleName;

    protected $lastName;

    protected $suffix;

    protected $payerId;

    protected $phone;

    protected $countryCode;

    protected $shippingAddress;

    protected $taxIdType;

    protected $taxId;

    public function getEmail()
    {
        return $this->email;
    }

    public function getSalutation()
    {
        return $this->salutation;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getMiddleName()
    {
        return $this->middleName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getSuffix()
    {
        return $this->suffix;
    }

    public function getPayerId()
    {
        return $this->payerId;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getCountryCode()
    {
        return $this->countryCode;
    }

    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    public function getTaxIdType()
    {
        return $this->taxIdType;
    }

    public function getTaxId()
    {
        return $this->taxId;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
    }

    public function setPayerId($payerId)
    {
        $this->payerId = $payerId;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
    }

    public function setTaxIdType($taxIdType)
    {
        $this->taxIdType = $taxIdType;
    }

    public function setTaxId($taxId)
    {
        $this->taxId = $taxId;
    }
}
