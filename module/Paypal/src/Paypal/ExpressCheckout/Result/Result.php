<?php
namespace Paypal\ExpressCheckout\Result;

class Result
{
    protected $dateTime;
    protected $correlationId;
    protected $ack;
    protected $version;
    protected $build;

    /**
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * @return integer
     */
    public function getCorrelationId()
    {
        return $this->correlationId;
    }

    /**
     * @return string
     */
    public function getAck()
    {
        return $this->ack;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return string
     */
    public function getBuild()
    {
        return $this->build;
    }

    /**
     * @param string|\DateTime $date
     * @return Set
     */
    public function setDateTime($dateTime)
    {
        if (is_string($dateTime)) {
            $this->dateTime = \DateTime::createFromFormat('Y-m-dTH:i:sZ', $dateTime);
        } else {
            $this->dateTime = $dateTime;
        }
        return $this;
    }

    /**
     * @param string $correlationId
     * @return Set
     */
    public function setCorrelationId($correlationId)
    {
        $this->correlationId = $correlationId;
        return $this;
    }

    /**
     * @param string $ack
     * @return Set
     */
    public function setAck($ack)
    {
        $this->ack = $ack;
        return $this;
    }

    /**
     * @param string $version
     * @return Set
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @param string $build
     * @return Set
     */
    public function setBuild($build)
    {
        $this->build = $build;
        return $this;
    }
}
