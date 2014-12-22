<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2013 - 2015 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @var        stdClass $module
 * @var        Joomla\Registry\Registry $params
 */

defined('_JEXEC') or die;

JLoader::register('ModWowRecruitmentHelper', __DIR__ . '/helper.php');

$recruitment = ModWowRecruitmentHelper::getData($params);

if (empty($recruitment)) {
    return;
}

require JModuleHelper::getLayoutPath($module->module, $params->get('layout', 'default'));