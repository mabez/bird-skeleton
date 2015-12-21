<?php
namespace Paypal\Payment\Payer;

class Payer
{

    const PAYMENT_METHOD_CREDIT_CARD = 'credit_card';

    const PAYMENT_METHOD_PAYPAL = 'paypal';

    const STATUS_VERIFIED = 'VERIFIED';

    const STATUS_UNVERIFIED = 'UNVERIFIED';

    protected $paymentMethod;

    protected $fundingInstruments;

    protected $payerInfo;

    protected $status;

    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    public function getFundingInstruments()
    {
        return $this->fundingInstruments;
    }

    public function getPayerInfo()
    {
        return $this->payerInfo;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function setFundingInstruments($fundingInstruments)
    {
        $this->fundingInstruments = $fundingInstruments;
    }

    public function setPayerInfo($payerInfo)
    {
        $this->payerInfo = $payerInfo;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}
