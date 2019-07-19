# Mobilpay

Laravel 5 mobilpay wrapper around omnipay with omnipay-mobilpay driver Edit
Add topics

## Table of Contents

- <a href="#installation">Installation</a>
    - <a href="#composer">Composer</a>
    - <a href="#laravel">Laravel</a>
- <a href="#basic-usage">Basic Usage</a>
    - <a href="#initiating-payment-request">Initiating Payment Request</a>
    - <a href="#handle-reponse">Handle Reponse</a>
- <a href="#options">Options</a>
	- <a href="#order-id">Order Id</a>
	- <a href="#amount">Amount</a>
	- <a href="#currency">Currency</a>
	- <a href="#details">Details</a>
	- <a href="#confirm-url">Confirm Url</a>
	- <a href="#return-url">Return Url</a>
	- <a href="#test-mode">Test Mode</a>
	- <a href="#additional-params"> Additional Params </a>

## Installation

### Composer

Require the package via composer
```bash
composer require adrianbarbos/mobilpay
```

Or add the package to your `composer.json` file.

```json
{
    "require": {
        "adrianbarbos/mobilpay": "^1.0"
    }
}
```

And run `composer update` to get the latest version of the package.

### Laravel

Mobilpay comes with a service provider for Laravel. You'll need to add it to your `composer.json` as mentioned in the above steps, then register the service provider with your application.

**From Laravel 5.5, the service provider and facades will automatically get registered.**

Open `config/app.php` and find the `providers` key. Add `MobilpayServiceProvider` to the array.

```php
...
Adrianbarbos\Mobilpay\MobilpayServiceProvider::class,
...
```

Add the required aliases to the list of class aliases in the same file.

```php
...
'Omnipay' => Omnipay\Omnipay::class,
'Mobilpay'	=> Adrianbarbos\Mobilpay\Mobilpay::class,
...
```

Publish config.

```
php artisan vendor:publish --provider="Adrianbarbos\Mobilpay\MobilpayServiceProvider"
```


## Basic Usage

### Initiating Payment Request


```php
// controller function

Mobilpay::setOrderId(1)
        ->setAmount('10.00')
        ->setDetails('Some details')
        ->purchase();
```

### Handle Reponse


```php
// controller function

$response = Mobilpay::response();

$data = $response->getData(); //array

switch($response->getMessage())
{
    case 'confirmed_pending': // transaction is pending review. After this is done, a new IPN request will be sent with either confirmation or cancellation

        //update DB, SET status = "pending"

        break;
    case 'paid_pending': // transaction is pending review. After this is done, a new IPN request will be sent with either confirmation or cancellation

        //update DB, SET status = "pending"

        break;
    case 'paid': // transaction is pending authorization. After this is done, a new IPN request will be sent with either confirmation or cancellation

        //update DB, SET status = "open/preauthorized"

        break;
    case 'confirmed': // transaction is finalized, the money have been captured from the customer's account

        //update DB, SET status = "confirmed/captured"

        break;
    case 'canceled': // transaction is canceled

        //update DB, SET status = "canceled"

        break;
    case 'credit': // transaction has been refunded

        //update DB, SET status = "refunded"

        break;
}	                
```

# Options

### Order id

```php
/**
 * @param $value string
 * @return $this
 */

public function setOrderId($value)
```

### Amount

```php
/**
 * @param $value string
 * @return $this
 */

public function setAmount($value)
```

### Currency

```php
/**
 * @param $value string
 * @return $this
 */

public function setCurrency($value)
```

### Details

```php
/**
 * @param $value string
 * @return $this
 */

public function setDetails($value)
```

### Confirm Url

```php
/**
 * @param $value string
 * @return $this
 */

public function setConfirmUrl($value)
```

### Return Url

```php
/**
 * @param $value string
 * @return $this
 */

public function setReturnUrl($value)
```

### Test Mode

```php
/**
 * @param $value boolean
 * @return $this
 */

public function setTestMode($value)
```

### Additional Params

```php
/**
 * @param $value array
 * @return $this
 */

public function setAdditionalParams($value)
```
