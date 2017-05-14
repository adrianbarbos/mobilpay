<?php

namespace Adrianbarbos\Mobilpay;

trait DataTrait {
    protected function initData() {
        $this->data = [
            'orderId'    => '',
            'amount'     => '',
            'currency'   => config('mobilpay.currency'),
            'details'    => '',
            'confirmUrl' => config('mobilpay.confirm_url'),
            'returnUrl'  => config('mobilpay.return_url'),
            'cancelUrl'  => config('mobilpay.cancel_url'),
            'testMode'   => config('mobilpay.testMode'),
            'params' => []
        ];
    }

    /**
     * @param $value string
     * @return $this
     */
    public function setOrderId($value) {
        $this->data['orderId'] = $value;

        return $this;
    }

    /**
     * @param $value string
     * @return $this
     */
    public function setAmount($value) {
        $this->data['amount'] = $value;

        return $this;
    }

    /**
     * @param $value string
     * @return $this
     */
    public function setCurrency($value) {
        $this->data['currency'] = $value;

        return $this;
    }

    /**
     * @param $value string
     * @return $this
     */
    public function setDetails($value) {
        $this->data['details'] = $value;

        return $this;
    }

    /**
     * @param $value string
     * @return $this
     */
    public function setConfirmUrl($value) {
        $this->data['confirmUrl'] = $value;

        return $this;
    }

    /**
     * @param $value string
     * @return $this
     */
    public function setReturnUrl($value) {
        $this->data['returnUrl'] = $value;

        return $this;
    }

    /**
     * @param $value string
     * @return $this
     */
    public function setCancelUrl($value) {
        $this->data['cancelUrl'] = $value;

        return $this;
    }

    /**
     * @param $value boolean
     * @return $this
     */
    public function setTestMode($value) {
        $this->data['testMode'] = $value;

        return $this;
    }

    /**
     * @param array $value
     * @return $this
     */
    public function setAdditionalParams(array $value) {
        $this->data['params'] = $value;

        return $this;
    }
}