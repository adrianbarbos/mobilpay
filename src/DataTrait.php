<?php

namespace Adrianbarbos\Mobilpay;

use Omnipay\MobilPay\Api\Address;

trait DataTrait
{
    protected function initData()
    {
        $this->data = [
            'orderId'    => '',
            'amount'     => '',
            'currency'   => config('mobilpay.currency'),
            'details'    => '',
            'confirmUrl' => config('mobilpay.confirm_url'),
            'returnUrl'  => config('mobilpay.return_url'),
            'cancelUrl'  => config('mobilpay.cancel_url'),
            'testMode'   => config('mobilpay.testMode'),
            'params'     => []
        ];

        //ensure absolute urls
        foreach (['confirmUrl', 'returnUrl', 'cancelUrl'] as $var) {
            if ($this->isRelativeUrl($this->data[$var])) {
                $this->data[$var] = url($this->data[$var]);
            }
        }
    }

    /**
     * @param string $url
     * @return bool
     */
    protected function isRelativeUrl($url)
    {
        $url = parse_url($url);
        return empty($url['host']);
    }

    /**
     * @param $value string
     * @return $this
     */
    public function setOrderId($value)
    {
        $this->data['orderId'] = $value;

        return $this;
    }

    /**
     * @param $value string
     * @return $this
     */
    public function setAmount($value)
    {
        $this->data['amount'] = $value;

        return $this;
    }

    /**
     * @param $value string
     * @return $this
     */
    public function setCurrency($value)
    {
        $this->data['currency'] = $value;

        return $this;
    }

    /**
     * @param $value string
     * @return $this
     */
    public function setDetails($value)
    {
        $this->data['details'] = $value;

        return $this;
    }

    /**
     * @param $value string
     * @return $this
     */
    public function setConfirmUrl($value)
    {
        $this->data['confirmUrl'] = $value;

        return $this;
    }

    /**
     * @param $value string
     * @return $this
     */
    public function setReturnUrl($value)
    {
        $this->data['returnUrl'] = $value;

        return $this;
    }

    /**
     * @param $value string
     * @return $this
     */
    public function setCancelUrl($value)
    {
        $this->data['cancelUrl'] = $value;

        return $this;
    }

    /**
     * @param $value boolean
     * @return $this
     */
    public function setTestMode($value)
    {
        $this->data['testMode'] = $value;

        return $this;
    }

    /**
     * @param array $value
     * @return $this
     */
    public function setAdditionalParams(array $value)
    {
        $this->data['params'] = $value;

        return $this;
    }

    /**
     * @param array $value
     * @return $this
     */
    public function setBillingAddress(array $value)
    {
        $this->data['billingAddress'] = $this->ensureAddressDefaults($value);

        return $this;
    }

    /**
     * @param array $value
     * @return $this
     */
    public function setShippingAddress(array $value)
    {
        $this->data['shippingAddress'] = $this->ensureAddressDefaults($value);

        return $this;
    }

    /**
     * @param array $address
     * @return array
     */
    protected function ensureAddressDefaults(array $address)
    {
        $fields = [
            'type', 'firstName', 'lastName', 'fiscalNumber', 'identityNumber', 'country', 'county',
            'city', 'zipCode', 'address', 'email', 'mobilePhone', 'bank', 'iban'
        ];

        foreach ($fields as $field) {
            if (!array_key_exists($field, $address)) {
                $address[$field] = '';
            }
        }

        if (!in_array($address['type'], [Address::TYPE_COMPANY, Address::TYPE_PERSON])) {
            $address['type'] = Address::TYPE_PERSON;
        }

        return $address;
    }
}