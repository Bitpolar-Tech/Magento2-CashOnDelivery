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

namespace Bitpolar\CashOnDelivery\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;
use Bitpolar\CashOnDelivery\Model\Config;

class CalculationType implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['label' => __('Fixed'), 'value' => Config::CALCULATION_TYPE_FIXED],
            ['label' => __('Percentage'), 'value' => Config::CALCULATION_TYPE_PERCENTAGE],
        ];
    }
}
