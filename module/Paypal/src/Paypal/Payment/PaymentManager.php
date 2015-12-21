<?php
namespace Paypal\Payment;

use Zend\Http\Request;
use Zend\Http\Headers;
use Zend\Uri\Http;
use Zend\Http\Client;
use Zend\Http\Client\Adapter\Curl;

class PaymentManager
{
    private $client;
    
    private $config = array();
    
    public function __construct($config = array())
    {
        $this->setConfigDefaults();
        $this->config = array_merge_recursive($this->config, $config);
        $this->client = new Client();
        $this->client->setAdapter(new Curl());
    }

    public function get($paymentId)
    {
        ;
    }
    public function create(Payment $payment)
    {
        ;
    }
    public function update(Payment $payment)
    {
        ;
    }
    public function delete($paymentId)
    {
        ;
    }

    private function setConfigDefaults()
    {
        $this->config['headers']['Content-Type'] = 'application/json';
        $this->config['httpVersion'] = Request::VERSION_11;
    }
    
    private function getHttpVersion()
    {
        return $this->config['httpVersion'];
    }
    
    private function getUri()
    {
        return new Http($this->config['URL']);
    }
    
    private function getDefaultHeaders()
    {
        return $this->config['headers'];
    }
    
    private function getRequest($content)
    {
        if (is_array($content)) {
            $content = http_build_query($content);
        }

        $request = new Request();
        $request->setUri($this->getUri());
        $headers = new Headers();
        $headers->addHeaders($this->getDefaultHeaders());
        $request->setHeaders($headers);
        $request->setVersion($this->getHttpVersion());
        $request->setContent($content);

        return $request;
    }
}
