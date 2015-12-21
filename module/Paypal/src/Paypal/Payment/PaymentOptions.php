<?php
namespace Paypal\Payment;

class PaymentOptions
{
    
    const ALLOWED_PAYMENT_METHOD_INSTANT_FUNDING_SOURCE = 'INSTANT_FUNDING_SOURCE';

    protected $allowedPaymentMethod;

    public function getAllowedPaymentMethod()
    {
        return $this->allowedPaymentMethod;
    }

    public function setAllowedPaymentMethod($allowedPaymentMethod)
    {
        $this->allowedPaymentMethod = $allowedPaymentMethod;
    }
}
