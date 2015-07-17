<?php
/**
 * Created by PhpStorm.
 * User: adriar
 * Date: 7/16/15
 * Time: 8:07 PM
 */

namespace Animals;


class AnimalAbstractTest extends \PHPUnit_Framework_TestCase
{

    protected static $stub;

    public function setUp()
    {
        self::$stub = $this->getMockForAbstractClass('\Animals\AnimalAbstract');
    }

    public function testSetGetName()
    {
        $stub = self::$stub;

        $name = 'Fluffy';
        $stub->setName($name);

        $actual = $stub->getName();

        $this->assertEquals($name, $actual);
    }

    public function testSetGetAge()
    {
        $stub = self::$stub;

        $age = 8;
        $stub->setAge($age);

        $actual = $stub->getAge();

        $this->assertEquals($age, $actual);
    }

    public function testSetGetFavoriteFood()
    {
        $stub = self::$stub;

        $food = 'Lasagne';
        $stub->setFavoriteFood($food);

        $actual = $stub->getFavoriteFood();

        $this->assertEquals($food, $actual);
    }

    public function testNameHistory()
    {
        $stub = self::$stub;

        $names = ['Fluffy', 'Nermal'];
        foreach ($names as $name) {
            $stub->setName($name);
        }

        $expected = implode(',', $names);
        $actual = $stub->getNames();

        $this->assertEquals($expected, $actual);
    }

    public function testAverageNameLength()
    {
        $stub = self::$stub;

        $names = ['Barry','Beaseley','Dewey','Dogbert','Fido','Gromit'];
        $totalLength = 0;
        foreach ($names as $name) {
            $stub->setName($name);
            $totalLength += strlen($name);
        }

        $expected = $totalLength / count($names);
        $actual = $stub->getAverageNameLength();

        $this->assertEquals($expected, $actual);
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testWarningMissingName()
    {
        $stub = self::$stub;

        $stub->setName();
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testWarningMissingAge()
    {
        $stub = self::$stub;

        $stub->setAge();
    }
}
