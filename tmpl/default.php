<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2013 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

if ($params->get('tooltips', 1)) {
    JHtml::_('behavior.tooltip');
}

JFactory::getDocument()->addStyleSheet(JUri::base(true) . '/modules/' . $module->module . '/tmpl/default.css');
?>
<div class="mod_wow_recruitment">
    <?php foreach ($recruitment as $class => $specs) : ?>
        <div class="class <?php echo $class; ?>">
            <span class="icon name"><?php echo JText::_('MOD_WOW_RECRUITMENT_CLASS_' . strtoupper($class)); ?></span>
            <?php if ($params->get('link')) : ?>
                <?php echo JHtml::_('link', $params->get('link'), JText::_('MOD_WOW_RECRUITMENT_PROMOTE'), array('title' => JText::_('MOD_WOW_RECRUITMENT_PROMOTE'))); ?>
            <?php endif; ?>
            <div class="specs">
                <?php foreach ($specs as $spec => $role) : ?>
                    <?php
                    if ($params->get($class . '_' . $spec, 'no') == 'hide') {
                        continue;
                    } ?>
                    <div class="spec <?php echo ($params->get($class . '_' . $spec, 'none') == 'none') ? $spec . ' disabled' : $spec; ?> hasTip" title="<?php echo JText::_('MOD_WOW_RECRUITMENT_CLASS_' . strtoupper($class . '_' . $spec)); ?>::<?php echo JText::_('MOD_WOW_RECRUITMENT_PRIO_' . strtoupper($params->get($class . '_' . $spec, 'none'))); ?>">
                        <span class="role <?php echo $role; ?>"></span>
                        <span class="prio <?php echo $params->get($class . '_' . $spec, 'none'); ?>"></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>