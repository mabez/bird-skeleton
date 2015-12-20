<?php
namespace Paypal\ExpressCheckout\Result;

use Paypal\ExpressCheckout\PaymentRequest\PaymentRequest;

class GetDetails extends Result
{
    protected $paymentRequests;
    
    /**
     * @return array
     */
    public function getPaymentRequests()
    {
        return $this->paymentRequest;
    }

    /**
     * @param array $paymentRequests
     * @return Set
     */
    public function setPaymentRequest($paymentRequests)
    {
        $this->paymentRequests = $paymentRequests;
        return $this;
    }
}
