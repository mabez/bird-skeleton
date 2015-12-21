<?php
namespace Paypal\Payment;

class Payment
{

    const INTENT_SALE = 'sale';

    const INTENT_AUTHORIZE = 'authorize';

    const INTENT_ORDER = 'order';

    const STATE_CREATED = 'created';

    const STATE_APPROVED = 'approved';

    const STATE_FAILED = 'failed';

    const STATE_PENDING = 'pending';

    const STATE_CANCELED = 'canceled';

    const STATE_EXPIRED = 'expired';

    const STATE_IN_PROGRESS = 'in_progress';

    protected $intent;

    protected $payer;

    protected $transactions;

    protected $redirectUrls;

    protected $id;

    protected $create_time;

    protected $state;

    protected $updateTime;

    protected $experienceProfileId;

    public function getIntent()
    {
        return $this->intent;
    }

    public function getPayer()
    {
        return $this->payer;
    }

    public function getTransactions()
    {
        return $this->transactions;
    }

    public function getRedirectUrls()
    {
        return $this->redirectUrls;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCreate_time()
    {
        return $this->create_time;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getUpdateTime()
    {
        return $this->updateTime;
    }

    public function getExperienceProfileId()
    {
        return $this->experienceProfileId;
    }

    public function setIntent($intent)
    {
        $this->intent = $intent;
    }

    public function setPayer($payer)
    {
        $this->payer = $payer;
    }

    public function setTransactions($transactions)
    {
        $this->transactions = $transactions;
    }

    public function setRedirectUrls($redirectUrls)
    {
        $this->redirectUrls = $redirectUrls;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCreate_time($create_time)
    {
        $this->create_time = $create_time;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function setUpdateTime($updateTime)
    {
        $this->updateTime = $updateTime;
    }

    public function setExperienceProfileId($experienceProfileId)
    {
        $this->experienceProfileId = $experienceProfileId;
    }
}
