<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2013 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

abstract class mod_wow_recruitment
{

    private static $classes = array(

        'deathknight' => array(
            'blood' => 'tank',
            'frost' => 'dd',
            'unholy' => 'dd'
        ),
        'druid' => array(
            'balance' => 'dd',
            'restoration' => 'heal',
            'feral' => 'dd',
            'guardian' => 'tank'
        ),
        'hunter' => array(
            'beastmaster' => 'dd',
            'marksmanship' => 'dd',
            'survival' => 'dd'
        ),
        'mage' => array(
            'arcane' => 'dd',
            'fire' => 'dd',
            'frost' => 'dd'
        ),
        'monk' => array(
            'brewmaster' => 'tank',
            'Mistweaver' => 'heal',
            'windwalker' => 'dd'
        ),
        'paladin' => array(
            'holy' => false,
            'protection' => 'tank',
            'retribution' => 'dd'
        ),
        'priest' => array(
            'discipline' => 'heal',
            'holy' => 'heal',
            'shadow' => 'dd'
        ),
        'rogue' => array(
            'assassination' => 'dd',
            'combat' => 'dd',
            'subtlety' => 'dd'
        ),
        'shaman' => array(
            'elemental' => 'dd',
            'enhancement' => 'dd',
            'restoration' => 'heal'
        ),
        'warlock' => array(
            'affliction' => 'dd',
            'demonology' => 'dd',
            'destruction' => 'dd'
        ),
        'warrior' => array(
            'protection' => 'tank',
            'fury' => 'dd',
            'arms' => 'dd'
        )
    );

    public static function _(JRegistry &$params)
    {
        $hide = array();
        foreach (self::$classes as $class => $specs) {
            $hide[$class] = array();
            foreach ($specs as $spec => $role) {
                if ($params->get($class . '_' . $spec) == 'hide') {
                    $hide[$class][$spec] = true;
                }
            }
            if (count($hide[$class]) == count($specs)) {
                unset(self::$classes[$class]);
            }
        }

        return self::$classes;
    }
}