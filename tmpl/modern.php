<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2013 - 2015 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

if (version_compare(JVERSION, 3, '>=')) {
    JHtml::_('bootstrap.tooltip', '.mod_wow_recruitment .tip', array('placement' => 'top'));
} else {
    JHtml::_('behavior.tooltip', '.mod_wow_recruitment .tip');
}

JFactory::getDocument()->addStyleSheet('media/' . $module->module . '/css/modern.css');
?>
<div class="mod_wow_recruitment">
    <?php if ($params->get('note')): ?>
        <div class="class note">
            <?php echo nl2br($params->get('note')); ?>
        </div>
    <?php endif; ?>

    <?php if ($params->get('button') && $params->get('link')): ?>
        <div class="class apply">
            <?php echo JHtml::_('link', $params->get('link'), $params->get('button')); ?>
        </div>
    <?php endif; ?>

    <?php foreach ($recruitment as $class => $specs) : ?>
        <div class="class <?php echo $class; ?>">
            <div class="summary">
                <span class="icon"></span>
                <span class="name"><?php echo JText::_('MOD_WOW_RECRUITMENT_CLASS_' . strtoupper($class)); ?></span>

                <div class="specs">
                    <?php foreach ($specs as $spec => $role) : ?>
                        <?php
                        if ($params->get($class . '_' . $spec, 'no') == 'hide') {
                            continue;
                        } ?>
                        <div class="spec <?php echo ($params->get($class . '_' . $spec, 'none') == 'none') ? $spec . ' disabled' : $spec; ?> tip" title="<?php echo JText::_('MOD_WOW_RECRUITMENT_PRIO_' . strtoupper($params->get($class . '_' . $spec, 'none'))); ?>">
                            <?php if ($params->get('roles', 1)): ?>
                                <span class="role <?php echo $role; ?>"></span>
                            <?php endif; ?>
                            <span class="prio <?php echo $params->get($class . '_' . $spec, 'none'); ?>"></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php if ($params->get($class . '_text')): ?>
                <div class="text">
                    <?php echo $params->get($class . '_text'); ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>