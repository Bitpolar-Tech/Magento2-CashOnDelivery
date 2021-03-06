<?php
/**
 * Phoenix Cash on Delivery module for Magento 2
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category   Mage
 * @package    Bitpolar_CashOnDelivery
 * @copyright  Copyright (c) 2017 Phoenix Media GmbH (http://www.phoenix-media.eu)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Bitpolar\CashOnDelivery\Plugin\Sales;

use Magento\Sales\Model\Order;

/**
 * Class OrderPlugin
 *
 * @package Bitpolar\CashOnDelivery\Plugin\Sales
 */
class OrderPlugin
{
    /**
     * Adds canceled Cash on Delivery fee to order
     *
     * @param Order $subject
     * @param Order $order
     * @return Order
     */
    public function afterRegisterCancellation(Order $subject, Order $order)
    {
        $order->setBaseCodFeeCanceled($subject->getBaseCodFee() - $subject->getBaseCodFeeInvoiced());
        $order->setCodFeeCanceled($subject->getCodFee() - $subject->getCodFeeInvoiced());

        $order->setBaseCodTaxAmountCanceled($subject->getBaseCodTaxAmount() - $subject->getBaseCodTaxAmountInvoiced());
        $order->setCodTaxAmountCanceled($subject->getCodTaxAmount() - $subject->getCodTaxAmountInvoiced());

        return $order;
    }
}
