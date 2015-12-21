<?php
namespace Paypal\ShippingAddress;

class ShippingAddress
{
    const TYPE_RESIDENTIAL = 'residential';
    const TYPE_BUSINESS = 'business';
    const TYPE_MAILBOX = 'mailbox';
    
    protected $recipientName;

    protected $type;

    protected $line1;

    protected $line2;

    protected $city;

    protected $countryCode;

    protected $postalCode;

    protected $state;

    protected $phone;

    public function getRecipientName()
    {
        return $this->recipientName;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getLine1()
    {
        return $this->line1;
    }

    public function getLine2()
    {
        return $this->line2;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getCountryCode()
    {
        return $this->countryCode;
    }

    public function getPostalCode()
    {
        return $this->postalCode;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setRecipientName($recipientName)
    {
        $this->recipientName = $recipientName;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setLine1($line1)
    {
        $this->line1 = $line1;
    }

    public function setLine2($line2)
    {
        $this->line2 = $line2;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
}
