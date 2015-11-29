<?php
namespace Paypal\ExpressCheckout\PaymentRequest;

class PaymentRequest
{
    
    const PREFIX_FIELD = 'PAYMENTREQUEST';
    
    const PREFIX_LFIELD = 'L_PAYMENTREQUEST';
    
    protected $index;

    protected $paymentAction;

    protected $amt;

    protected $currencyCode;

    protected $itemAmt;

    protected $invNum;

    protected $l;
    
    public function __construct($index, $l = array())
    {
        $this->index = $index;
        $this->l = $l;
        
    }

    public function getPaymentAction()
    {
        return $this->paymentAction;
    }

    public function getAmt()
    {
        return $this->amt;
    }

    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    public function getItemAmt()
    {
        return $this->itemAmt;
    }

    public function getInvNum()
    {
        return $this->invNum;
    }

    public function getL()
    {
        return $this->l;
    }

    public function setPaymentAction($paymentAction)
    {
        $this->paymentAction = $paymentAction;
        return $this;
    }

    public function setAmt($amt)
    {
        $this->amt = $amt;
        return $this;
    }

    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
        return $this;
    }

    public function setItemAmt($itemAmt)
    {
        $this->itemAmt = $itemAmt;
        return $this;
    }

    public function setInvNum($invNum)
    {
        $this->invNum = $invNum;
        return $this;
    }

    public function setL($l)
    {
        $this->l = $l;
        return $this;
    }
    
    public function addLPaymentRequest(LPaymentRequest $lpaymentRequest)
    {
        $this->l[] = $lpaymentRequest;
        return $this;
    }
    
    public function getLPaymentRequest($index)
    {
        return $this->l[$index];
    }
    
    public function removeLPaymentRequest($index)
    {
        unset($this->l[$index]);
        return $this;
    }
    
    public function countL()
    {
        return count($this->l);
    }
    
    public function toArray()
    {
        $prefixField = self::PREFIX_FIELD . '_' . $this->index . '_';
        $array = array(
             $prefixField . 'PAYMENTACTION' => $this->getPaymentAction(),
             $prefixField . 'AMT' => $this->getAmt(),
             $prefixField . 'CURRENCYCODE' => $this->getCurrencyCode(),
             $prefixField . 'ITEMAMT' => $this->getItemAmt(),
             $prefixField . 'INVNUM' => $this->getInvNum(),
        );
        foreach ($this->l as $i => $lPaymentRequest) {
            $lfields = $lPaymentRequest->toArray();
            foreach ($lfields as $lfield => $lvalue) {
                $array[self::PREFIX_LFIELD . '_' . $this->index . '_' . $lfield . $i] = $lvalue;
            }
        }
    }
}
