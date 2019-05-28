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
define(
    [
        'Magento_Checkout/js/view/payment/default',
        'Magento_Checkout/js/model/quote',
        'Magento_Checkout/js/action/set-payment-information',
        'Magento_Checkout/js/action/get-totals',
        'ko'
    ],
    function(Component, quote, setPaymentInformation, getTotals, ko) {
        'use strict';

        quote.paymentMethod.subscribe(function (oldValue) {
            if (oldValue !== null) {
                window.checkoutConfig.payment.bitpolar_cashondelivery.previousMethod = oldValue.method;
            }
        }, null, 'beforeChange');

        quote.paymentMethod.subscribe(function (newValue) {
            var oldMethod = window.checkoutConfig.payment.bitpolar_cashondelivery.previousMethod;
            var newMethod = newValue.method;
            if (oldMethod === 'bitpolar_cashondelivery' || newMethod === 'bitpolar_cashondelivery') {
                var paymentMethod = quote.paymentMethod();
                if (paymentMethod.title) {
                    return;
                }
                setPaymentInformation(null, paymentMethod);
                getTotals([]);
            }
        });

        return Component.extend({
            defaults: {
                template: 'Bitpolar_CashOnDelivery/payment/bitpolar_cashondelivery'
            },
            getCustomText: function () {
                return window.checkoutConfig.payment.bitpolar_cashondelivery.customText;
            }
        });
    }
);