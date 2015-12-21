<?php
namespace Paypal\Payment\Transaction;

class ItemList
{

    protected $items;

    protected $shippingAddress;

    public function getItems()
    {
        return $this->items;
    }

    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }

    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
    }
}
