<?php
/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) 2014 Djordje Ungar <http://djordjeungar.com>
 * @license http://opensource.org/licenses/MIT MIT
 */

if (!function_exists('isget')) {


    /**
     * This is a handy little helper function that is used to replace the common pattern of 
     * isset($a, $a['b']) ? $a['b'] : $c; which can be ugly and redundant.
     *
     * @param mixed $value 
     * @param mixed $default 
     * @return mixed
     */
    function isget(&$value, $default = false) {
        return isset($value) ? $value : $default;
    }
}
