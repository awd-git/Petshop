<?php
/**
 * Created by PhpStorm.
 * User: adriar
 * Date: 7/16/15
 * Time: 9:14 AM
 */

namespace Animals;

/**
 * Class AnimalAbstract
 * @package Animals
 */
class AnimalAbstract
{
    /**
     * The animal's name
     * @var string
     */
    protected $name = '';
    /**
     * All the animal's names
     * @var array
     */
    protected $names = [];
    /**
     * The animal's age
     * @var integer
     */
    protected $age = 0;
    /**
     * The animal's favorite food
     * @var string
     */
    protected $favoriteFood = '';

    public function __construct($config = [])
    {
        if (!empty($config)) {
            $this->setFavoriteFood(@$config['favoriteFood']);
            $this->setName((@$config['name']));
            $this->setAge(@$config['age']);
        }
    }

    /**
     * Setter method for the animal's name
     *
     * @param string $name
     * @return AnimalAbstract
     */
    public function setName($name)
    {
        $this->name = $name;
        if ( strlen($name) > 0 ) {
            $this->names[] = $this->name;
        } else {
            trigger_error('No name has been given', E_USER_WARNING);
        }

        return $this;
    }

    /**
     * Getter method for the animal's name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Gets all the names for the animal in comma-separated string
     * @return string
     */
    public function getNames()
    {
        return implode(',', $this->names);
    }

    /**
     * Calculates the average length of all the animal's names
     *
     * @return float|int
     */
    public function getAverageNameLength()
    {
        $count = count($this->names);
        if ($count === 0) {
            return 0;
        }

        $totalLength = 0;
        foreach ($this->names as $name) {
            $totalLength += strlen($name);
        }

        return $totalLength / $count;
    }

    /**
     * Setter method for the animal's age
     *
     * @param int $age
     * @return AnimalAbstract
     * @throws \Exception
     */
    public function setAge($age = null)
    {
        if (is_null($age)) {
            trigger_error('No age has been set', E_USER_WARNING);
            // accepted default
        } elseif (!is_int($age)) {
            throw new \Exception('The animal\'s age must be an integer');
        } elseif ($age < 0) {
            throw new \Exception('The animal\'s age must be a positive value');
        }

        $this->age = (int)$age;

        return $this;
    }

    /**
     * Getter method for the animal's age
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    public function speak($word = '')
    {
        if (!is_string($word) || empty($word)) {
            throw new \Exception('var $word is not valid');
        }

        // this would be an actual STDOUT but it cannot be unit tested
//        fwrite(STDOUT, $word);
        // the result with echo and many other options is equal on the console with CLI
        echo $word;

        $this->age++;

        return $this;
    }

    /**
     * Setter method for the animal's favorite food
     *
     * @param string $favoriteFood
     * @return AnimalAbstract
     */
    public function setFavoriteFood($favoriteFood)
    {
        $this->favoriteFood = $favoriteFood;
        return $this;
    }

    /**
     * Getter method for the animal's favorite food
     * @return string
     */
    public function getFavoriteFood()
    {
        return (string)$this->favoriteFood;
    }
}