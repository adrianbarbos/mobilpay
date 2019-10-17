<?php

namespace Adrianbarbos\Mobilpay;

/**
 * Class Mobilpay
 * @package Adrianbarbos\Mobilpay
 * @method static \Omnipay\Common\Message\ResponseInterface purchase(bool $autoRedirect = true)
 * @method static \Omnipay\Common\Message\ResponseInterface response()
 * @method static MobilpayGateway setOrderId($orderId)
 * @method static MobilpayGateway setAmount($amount)
 * @method static MobilpayGateway setCurrency($currency)
 * @method static MobilpayGateway setDetails($setDetails)
 * @method static MobilpayGateway setConfirmUrl($url)
 * @method static MobilpayGateway setReturnUrl($url)
 * @method static MobilpayGateway setCancelUrl($url)
 * @method static MobilpayGateway setTestMode(bool $flag)
 * @method static MobilpayGateway setAdditionalParams(array $value)
 */
class Mobilpay extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'mobilpay';
    }
}
