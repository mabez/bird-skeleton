<?php
namespace Paypal\Payment\Item;

class Item
{

    protected $quantity;

    protected $name;

    protected $price;

    protected $currency;

    protected $sku;

    protected $description;

    protected $tax;

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function getSku()
    {
        return $this->sku;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getTax()
    {
        return $this->tax;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setTax($tax)
    {
        $this->tax = $tax;
    }
}
