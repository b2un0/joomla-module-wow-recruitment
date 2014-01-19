<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2013 - 2014 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

require_once dirname(__FILE__) . '/helper.php';

$recruitment = mod_wow_recruitment::_($params);

if (empty($recruitment)) {
    return;
}

require JModuleHelper::getLayoutPath($module->module, $params->get('layout', 'default'));