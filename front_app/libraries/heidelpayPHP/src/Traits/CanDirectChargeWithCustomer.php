<?php
/**
 * This trait makes a payment type chargeable with mandatory customer.
 *
 * Copyright (C) 2018 heidelpay GmbH
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @link  http://dev.heidelpay.com/
 *
 * @author  Simon Gabriel <development@heidelpay.com>
 *
 * @package  heidelpayPHP/traits
 */
namespace heidelpayPHP\Traits;

use heidelpayPHP\Exceptions\HeidelpayApiException;
use heidelpayPHP\Interfaces\HeidelpayParentInterface;
use heidelpayPHP\Resources\Basket;
use heidelpayPHP\Resources\Customer;
use heidelpayPHP\Resources\Metadata;
use heidelpayPHP\Resources\TransactionTypes\Charge;
use RuntimeException;

trait CanDirectChargeWithCustomer
{
    /**
     * Charge an amount with the given currency.
     * Throws HeidelpayApiException if the transaction could not be performed (e. g. increased risk etc.).
     *
     * @param float           $amount
     * @param string          $currency
     * @param string          $returnUrl
     * @param Customer|string $customer
     * @param string|null     $orderId
     * @param Metadata|null   $metadata
     * @param Basket|null     $basket           The Basket object corresponding to the payment.
     *                                          The Basket object will be created automatically if it does not exist
     *                                          yet (i.e. has no id).
     * @param bool|null       $card3ds          Enables 3ds channel for credit cards if available. This parameter is
     *                                          optional and will be ignored if not applicable.
     * @param string|null     $invoiceId        The external id of the invoice.
     * @param string|null     $paymentReference A reference text for the payment.
     *
     * @return Charge
     *
     * @throws HeidelpayApiException
     * @throws RuntimeException
     */
    public function charge(
        $amount,
        $currency,
        $returnUrl,
        $customer,
        $orderId = null,
        $metadata = null,
        $basket = null,
        $card3ds = null,
        $invoiceId = null,
        $paymentReference = null
    ): Charge {
        if ($this instanceof HeidelpayParentInterface) {
            return $this->getHeidelpayObject()->charge(
                $amount,
                $currency,
                $this,
                $returnUrl,
                $customer,
                $orderId,
                $metadata,
                $basket,
                $card3ds,
                $invoiceId,
                $paymentReference
            );
        }

        throw new RuntimeException(
            self::class . ' must implement HeidelpayParentInterface to enable ' . __METHOD__ . ' transaction.'
        );
    }
}
