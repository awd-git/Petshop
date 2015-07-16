<?php
/**
 * Created by PhpStorm.
 * User: adriar
 * Date: 7/16/15
 * Time: 3:04 PM
 */

namespace Animals;

//use Animals\Cat;

class CatsTest extends \PHPUnit_Framework_TestCase
{

    public function testCatNameMethods()
    {
        @$cat = new Cat();

        $string = $cat->getName();
        $this->assertEmpty($string);

        $name = 'Gatto';
        $cat->setName($name);

        $this->assertEquals($cat->getName(), $name);
    }

    public function testCatInitialBetween5and10()
    {
        $result = true;
        for ($i = 0; $i < 100; $i++) {
            @$cat = new Cat();
            if ($cat->getAge() <= 5 || $cat->getAge() >= 10) {
                $result = false;
                break;
            }
        }

        $this->assertTrue($result, 'Cat age is not between 5 and 10');
    }

    public function testCatAgeMethods()
    {
        @$cat = new Cat();

        $string = $cat->getName();
        $this->assertEmpty($string);

        $age = rand(1, 20);
        $cat->setAge($age);

        $this->assertEquals($cat->getAge(), $age);
    }

    public function testCatFavoriteFoodMethods()
    {
        @$cat = new Cat();

        $string = $cat->getName();
        $this->assertEmpty($string);

        $food = 'fish';
        $cat->setFavoriteFood($food);

        $this->assertEquals($cat->getFavoriteFood(), $food);
    }

    public function testCageAgesWithSpeaking()
    {
        @$cat = new Cat();

        $age1 = $cat->getAge();
        ob_start();
        $cat->speak();
        $word = ob_get_clean();
        $this->assertEquals('meow', $word);
        $age2 = $cat->getAge();

        $this->assertEquals($age2, $age1 + 1);
    }

    public function testCatCanSayMouse()
    {
        @$cat = new Cat();

        $word = 'mouse';
        $this->expectOutputString($word);
        $cat->speak($word);
    }

    public function testGiveCatBirthAgeAndName()
    {
        $name = 'Garfield';
        $age = 0;
        $cat = new Cat(compact('name', 'age'));

        $this->assertEquals($name, $cat->getName());
        $this->assertEquals($age, $cat->getAge());
    }

    public function testCatHasFluidInterfaces()
    {
        @$cat = new Cat();

        $obj = $cat->setName('Gatto');
        $this->assertInstanceOf('\Animals\Cat', $obj);

        $obj = $cat->setAge(3);
        $this->assertInstanceOf('\Animals\Cat', $obj);

        $obj = $cat->setFavoriteFood('fish');
        $this->assertInstanceOf('\Animals\Cat', $obj);
    }

    public function testMultipleNamesAndAverageNameLength()
    {
        @$cat = new Cat();

        $names = ['Chaos', 'Chocolate', 'Felix', 'Garfield', 'Nermal', 'Scratchy'];
        $totalLength = 0;
        foreach ($names as $name) {
            $cat->setName($name);
            $totalLength += strlen($name);
        }

        $allNames = $cat->getNames();

        $this->assertEquals(implode(',', $names), $allNames);

        $this->assertEquals($totalLength / count($names), $cat->getAverageNameLength());
    }
}