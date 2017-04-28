<?php
/***************************************************************
 * Copyright notice
 *
 * (c) 2016 René Nitzsche <rene@system25.de>
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Tx_Rnbase_Utility_Cache
 *
 * @package         TYPO3
 * @subpackage      Tx_Rnbase
 * @author          Hannes Bochmann <hannes.bochmann@dmk-ebusiness.de>
 * @license         http://www.gnu.org/licenses/lgpl.html
 *                  GNU Lesser General Public License, version 3 or later
 */
class Tx_Rnbase_Utility_Cache
{

    /**
     * @param array $parameters
     * @return void
     */
    public static function addExcludedParametersForCacheHash($parameters)
    {
        $startingGlue = '';
        if ($GLOBALS['TYPO3_CONF_VARS']['FE']['cHashExcludedParameters']) {
            $startingGlue = ',';
        }
        $GLOBALS['TYPO3_CONF_VARS']['FE']['cHashExcludedParameters'] .= $startingGlue . join(',', $parameters);
        $cacheHashCalculator = tx_rnbase::makeInstance('TYPO3\\CMS\\Frontend\\Page\\CacheHashCalculator');

        $cacheHashCalculator->setConfiguration(array(
            'excludedParameters' => explode(',', $GLOBALS['TYPO3_CONF_VARS']['FE']['cHashExcludedParameters'])));
    }
}
