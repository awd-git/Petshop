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

    public function testSpeakSomething() {
        $stub = self::$stub;

        $string = 'something';
        $this->expectOutputString($string);

        $stub->speak($string);
    }


    /**
     * @expectedException \Exception
     * @expectedExceptionMessage var $word is not valid
     */
    public function testExceptionSpeakIsEmpty() {
        $stub = self::$stub;

        $stub->speak('');

    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage The animal's age must be an integer
     */
    public function testExceptionAgeNotInteger() {
        $stub = self::$stub;

        $stub->setAge('one');
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage The animal's age must be a positive value
     */
    public function testExceptionAgeNotPositiv() {
        $stub = self::$stub;

        $stub->setAge(-10);
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
