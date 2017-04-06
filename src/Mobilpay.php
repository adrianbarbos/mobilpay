<?php

namespace Adrianbarbos\Mobilpay;

class Mobilpay extends \Illuminate\Support\Facades\Facade {

    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor() { return 'mobilpay'; }

}