<?php

namespace Adrianbarbos\Mobilpay;

trait DataTrait {
    protected function initData() {
        $this->data = [
            'amount'     => '',
            'currency'   => config('mobilpay.currency'),
            'orderId'    => '',
            'confirmUrl' => config('mobilpay.confirm_url'),
            'returnUrl'  => config('mobilpay.return_url'),
            'details'    => '',
            'testMode'   => config('mobilpay.testMode')
        ];
    }

    public function setOrderId($value) {
        $this->data['orderId'] = $value;

        return $this;
    }

    public function setAmount($value) {
        $this->data['amount'] = $value;

        return $this;
    }

    public function setCurrency($value) {
        $this->data['currency'] = $value;

        return $this;
    }

    public function setDetails($value) {
        $this->data['details'] = $value;

        return $this;
    }

    public function setAdditionalParams(array $value) {
        $this->data['params'] = $value;

        return $this;
    }
}