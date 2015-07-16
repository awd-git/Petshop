<?php
/**
 * Created by PhpStorm.
 * User: adriar
 * Date: 7/16/15
 * Time: 8:37 AM
 */

namespace Animals;

require_once('AnimalAbstract.php');

class Cat extends AnimalAbstract
{

    public function __construct($config = [])
    {
        if (!isset($config['age']) || strlen($config['age']) === 0) {
            $config['age'] = rand(6, 9);
        }
        return parent::__construct($config);
    }

    public function speak($word = '') {
        if ( strlen($word) === 0) {
            $word = 'meow';
        }
        return parent::speak($word);
    }

    public function breakAge() {
        $this->age = null;
    }
}