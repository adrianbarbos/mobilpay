<?php

namespace Adrianbarbos\Mobilpay;

use Omnipay\Omnipay;

class MobilpayGateway {

    protected $data;
    protected $gateway;

    use DataTrait;

    function __construct() {

        $this->gateway = Omnipay::create('MobilPay')->setMerchantId(config('mobilpay.merchant_id'));

        $this->initData();
    }

    public function purchase() {
        $this->gateway->setPublicKey(config('mobilpay.public_key_path'));

        $response = $this->gateway->purchase($this->data)->send();

        $response->redirect();
    }

    public function response() {
        $this->gateway->privateKeyPath(config('mobilpay.private_key_path'));

        $response = $this->gateway->completePurchase($_POST)->send();
        $response->sendResponse();

        return $response;
    }

}

