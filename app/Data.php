<?php
/**
 * Created by PhpStorm.
 * User: adriar
 * Date: 7/16/15
 * Time: 9:50 AM
 */

namespace Animals;


use PDO;

class Data
{

    /**
     * Database object
     * @var object
     */
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function insert(\Animals\AnimalAbstract $object)
    {
        if (get_class($object) === 'Animals\Cat') {
            $animal = 'cats';
        } elseif (get_class($object) === 'Animals\Dog') {
            $animal = 'dogs';
        } else {
            throw new \Exception('We don\'t know this type of animal (' . get_class($object));
        }

        $sql = sprintf('INSERT INTO `animals` (`animal`,`name`,`age`,`favoriteFood`) VALUES (\'%s\', \'%s\', \'%s\', \'%s\');',
            $animal, $object->getName(), $object->getAge(), $object->getFavoriteFood());

        $statement = $this->db->prepare($sql);
        return $statement instanceof \PDOStatement ? $statement->execute() : false;
    }

    public function beginTran()
    {
        echo "Beginning a transaction\n";
        if (!$this->db->beginTransaction()) {
            throw new \Exception('Beginning transaction failed');
        }

        return $this;
    }

    public function commit()
    {
        echo "Committing transaction\n";
        return $this->db->commit();
    }

    public function rollback()
    {
        echo "Rolling back transaction\n";
        return $this->db->rollback();
    }
}