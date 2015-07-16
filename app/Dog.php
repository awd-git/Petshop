<?php
/**
 * Created by PhpStorm.
 * User: adriar
 * Date: 7/16/15
 * Time: 8:37 AM
 */

namespace Animals;

require_once('AnimalAbstract.php');

class Dog extends AnimalAbstract
{

    public function __construct($config = [])
    {
        if (!isset($config['age']) || empty($config['age'])) {
            $config['age'] = rand(6, 9);
        }

        return parent::__construct($config);
    }

    public function speak($word = '') {
        if ( empty($word)) {
            $word = 'woof';
        }
        return parent::speak($word);
    }
}