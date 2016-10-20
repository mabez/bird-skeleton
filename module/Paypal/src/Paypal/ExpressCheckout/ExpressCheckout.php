<?php
namespace Paypal\ExpressCheckout;

use Zend\Http\Client\Adapter\Curl;
use Zend\Http\Client;
use Zend\Uri\Http;
use Paypal\ExpressCheckout\PaymentRequest\PaymentRequest;
use Zend\Http\Request;
use Zend\Http\Headers;
use Paypal\ExpressCheckout\Result\Set as ResultSet;

class ExpressCheckout
{

    private $client;

    private $config = array();

    public function __construct($config = array())
    {
        $this->setConfigDefaults();
        $this->validateConfig($config);
        $this->config = array_merge_recursive($this->config, $config);
        $this->client = new Client();
        $this->client->setAdapter(new Curl());
    }

    public function set(PaymentRequest $paymentRequest, $returnUrl, $cancelUrl, $buttonSource, $subject)
    {

        $request = $this->getRequest(array_merge_recursive($paymentRequest->toArray(), array(
            'METHOD' => 'SetExpressCheckout',
            'RETURNURL' => $returnUrl,
            'CANCELURL' => $cancelUrl,
            'BUTTONSOURCE' => $buttonSource,
            'SUBJECT' => $subject
        )));

        $request->setMethod(Request::METHOD_POST);

        $response = $this->client->send($request);

        if ($response->isClientError()) {
            throw new ExpressCheckoutException($response->getContent(), $response->getStatusCode());
        }

        $result = new ResultSet();

        $content = $response->getBody();

        parse_str($content);

//         $result->setToken($TOKEN);
//         $result->setDateTime($TIMESTAMP);
//         $result->setCorrelationId($CORRELATIONID);
//         $result->setAck($ACK);
//         $result->setVersion($VERSION);
//         $result->setBuild($BUILD);

        return $result;
    }

    public function getDetails($token)
    {
        $request = $this->getRequest(array(
            'METHOD' => 'GetExpressCheckoutDetails',
            'TOKEN' => $token
        ));

        $request->setMethod(Request::METHOD_POST);

        $response = $this->client->send($request);

        if ($response->isClientError()) {
            return false;
        }

        $content = $response->getBody();

        parse_str($content);

        return $content;
    }

    public function doPayment()
    {}

    public function httpRedirect()
    {}

    public function callbackHttpRedirect()
    {}

    private function validateConfig($config)
    {
        if (! isset($config['URL'])) {
            throw new ExpressCheckoutException(ExpressCheckoutException::CONFIG_PARAM_HOST_INVALID);
        }

        if (! isset($config['USER'])) {
            throw new ExpressCheckoutException(ExpressCheckoutException::CONFIG_PARAM_USER_INVALID);
        }

        if (! isset($config['PWD'])) {
            throw new ExpressCheckoutException(ExpressCheckoutException::CONFIG_PARAM_PWD_INVALID);
        }

        if (! isset($config['SIGNATURE'])) {
            throw new ExpressCheckoutException(ExpressCheckoutException::CONFIG_PARAM_SIGNATURE_INVALID);
        }
    }

    private function setConfigDefaults()
    {
        $this->config['headers']['Content-Type'] = 'application/x-www-form-urlencoded; charset=utf-8';
        $this->config['VERSION'] = '114.0';
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

    private function getDefaultParams()
    {
        $defaultParams = array();
        $keyParams = array(
            'USER',
            'PWD',
            'SIGNATURE',
            'VERSION'
        );
        foreach ($this->config as $key => $param) {
            if (in_array($key, $keyParams)) {
                $defaultParams[$key] = $param;
            }
        }

        return $defaultParams;
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
