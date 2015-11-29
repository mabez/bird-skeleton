<?php
namespace Paypal\ExpressCheckout;

use Zend\Http\Client\Adapter\Curl;
use Zend\Uri\Uri;
use Paypal\ExpressCheckout\PaymentRequest\PaymentRequest;

class ExpressCheckout
{

    private $curl;
    private $config = array();
    
    public function __construct(Curl $curl, $config = array())
    {
        $this->curl = $curl;
        $this->setConfigDefaults();
        $this->validateConfig($config);
        $this->config = array_merge_recursive($this->config, $config);
    }
    
    public function set(PaymentRequest $paymentRequest, $returnUrl, $cancelUrl, $buttonSource, $subject)
    {
        $params['METHOD'] = 'SetExpressCheckout';
        $body = $this->createBody(
            $paymentRequest,
            array(
                'RETURNURL' => $returnUrl,
                'CANCELURL' => $cancelUrl,
                'BUTTONSOURCE' => $buttonSource,
                'SUBJECT' => $subject
            )
        );
        $this->curl->write('POST', $this->getUri(), $this->getHttpVersion(), $this->getDefaultHeaders(), $body);
    }
    
    public function getDetails()
    {
        
    }
    
    public function doPayment()
    {
        
    }
    
    public function httpRedirect()
    {
        
    }
    
    public function callbackHttpRedirect()
    {
        
    }
    
    private function validateConfig($config)
    {
        if (!isset($config['Host'])) {
            throw new ExpressCheckoutException(ExpressCheckoutException::CONFIG_PARAM_HOST_INVALID);
        }
        
        if (!isset($config['USER'])) {
            throw new ExpressCheckoutException(ExpressCheckoutException::CONFIG_PARAM_USER_INVALID);
        }
        
        if (!isset($config['PWD'])) {
            throw new ExpressCheckoutException(ExpressCheckoutException::CONFIG_PARAM_PWD_INVALID);
        }
        
        if (!isset($config['SIGNATURE'])) {
            throw new ExpressCheckoutException(ExpressCheckoutException::CONFIG_PARAM_SIGNATURE_INVALID);
        }
    }
    
    private function setConfigDefaults()
    {
        $this->config['headers']['Content-Type'] = 'application/x-www-form-urlencoded; charset=utf-8';
        $this->config['VERSION'] = '114.0';
        $this->config['httpVersion'] = '1.1';
    }
    
    private function getHttpVersion()
    {
        return $this->config['httpVersion'];
    }
    
    private function getUri()
    {
        return new Uri($this->config['Host']);
    }
    
    private function getDefaultHeaders()
    {
        return $this->config['headers'];
    }
    
    private function getDefaultParams()
    {
        $defaultParams = array();
        $keyParams = array('USER', 'PWD', 'SIGNATURE', 'VERSION');
        foreach ($this->config as $key => $param) {
            if (in_array($key, $keyParams)) {
                $defaultParams[$key] = $param;
            }
        }
        
        return $defaultParams;
    }
    
    private function createBody(PaymentRequest $paymentRequest, $additionalFields)
    {
        $body = '';
        $fields = array_merge_recursive($additionalFields, $paymentRequest->toArray());
        foreach ($fields as $fieldName => $fieldValue) {
            $body .= ''.$fieldName . '=' . $fieldValue.'&';
        }
        return $body;
    }
}
