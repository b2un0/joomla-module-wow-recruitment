<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2013 - 2015 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

abstract class ModWowRecruitmentHelper
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
            'mistweaver' => 'heal',
            'windwalker' => 'dd'
        ),
        'paladin' => array(
            'holy' => 'heal',
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
        ),
        'demonhunter' => array(
            'havoc' => 'dd',
            'vengeance' => 'tank'
        )
    );

    public static function getData(JRegistry $params)
    {
        $hide = array();
        $classes = self::$classes;
        foreach ($classes as $class => $specs) {
            $hide[$class] = array();
            foreach ($specs as $spec => $role) {
                if ($params->get($class . '_' . $spec) == 'hide') {
                    $hide[$class][$spec] = true;
                }
            }
            if (count($hide[$class]) == count($specs)) {
                unset($classes[$class]);
            }
        }

        return $classes;
    }
}