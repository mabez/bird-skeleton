<?php
namespace Paypal\Payment\Amount;

class AmountDetails
{

    protected $shipping;

    protected $subtotal;

    protected $tax;

    protected $handlingFee;

    protected $insurance;

    protected $shippingDiscount;

    public function getShipping()
    {
        return $this->shipping;
    }

    public function getSubtotal()
    {
        return $this->subtotal;
    }

    public function getTax()
    {
        return $this->tax;
    }

    public function getHandlingFee()
    {
        return $this->handlingFee;
    }

    public function getInsurance()
    {
        return $this->insurance;
    }

    public function getShippingDiscount()
    {
        return $this->shippingDiscount;
    }

    public function setShipping($shipping)
    {
        $this->shipping = $shipping;
    }

    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
    }

    public function setTax($tax)
    {
        $this->tax = $tax;
    }

    public function setHandlingFee($handlingFee)
    {
        $this->handlingFee = $handlingFee;
    }

    public function setInsurance($insurance)
    {
        $this->insurance = $insurance;
    }

    public function setShippingDiscount($shippingDiscount)
    {
        $this->shippingDiscount = $shippingDiscount;
    }
}
