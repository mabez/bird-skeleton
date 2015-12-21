<?php
namespace Paypal\Payment\RedirectUrls;

class RedirectUrls
{

    protected $returnUrl;

    protected $cancelUrl;

    public function getReturnUrl()
    {
        return $this->returnUrl;
    }

    public function getCancelUrl()
    {
        return $this->cancelUrl;
    }

    public function setReturnUrl($returnUrl)
    {
        $this->returnUrl = $returnUrl;
    }

    public function setCancelUrl($cancelUrl)
    {
        $this->cancelUrl = $cancelUrl;
    }
}
