<?php
namespace Paypal\ExpressCheckout\PaymentRequest;

class LPaymentRequest
{

    protected $name;

    protected $desc;

    protected $amt;

    protected $qty;

    protected $itemAmt;

    public function getName()
    {
        return $this->name;
    }

    public function getDesc()
    {
        return $this->desc;
    }

    public function getAmt()
    {
        return $this->amt;
    }

    public function getQty()
    {
        return $this->qty;
    }

    public function getItemAmt()
    {
        return $this->itemAmt;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setDesc($desc)
    {
        $this->desc = $desc;
        return $this;
    }

    public function setAmt($amt)
    {
        $this->amt = $amt;
        return $this;
    }

    public function setQty($qty)
    {
        $this->qty = $qty;
        return $this;
    }

    public function setItemAmt($itemAmt)
    {
        $this->itemAmt = $itemAmt;
        return $this;
    }
    
    public function toArray()
    {
        return array(
            'AMT' => $this->getAmt(),
            'DESC' => $this->getDesc(),
            'ITEMAMT' => $this->getItemAmt(),
            'NAME' => $this->getName(),
            'QTY' => $this->getQty()
        );
    }
}
