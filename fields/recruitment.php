<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2013 - 2015 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

JFormHelper::loadFieldClass('radio');

class JFormFieldRecruitment extends JFormFieldRadio
{
    public $type = 'Recruitment';

    private $options = array(
        'hide',
        'none',
        'no',
        'low',
        'medium',
        'high'
    );

    protected function getOptions()
    {
        $options = array();
        foreach ($this->options as $option) {
            $options[] = JHtml::_('select.option', $option, 'MOD_WOW_RECRUITMENT_PRIO_' . strtoupper($option));
        }

        return array_merge(parent::getOptions(), $options);
    }
}