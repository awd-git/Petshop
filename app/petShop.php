<?php
use Animals\Cat;
use Animals\Data;
use Animals\Dog;

/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 7/16/15
 * Time: 9:45 AM
 */


/**
 * Gets a data object
 *
 * @return Data
 */
function getDataObject()
{
    $pdo = new PDO(
        'sqlite:animals.sqlite'
    );

    $data = new Data($pdo);
    return $data;
}

/**
 * Create a cat and a dog and add them to the database
 * @throws Exception
 */
function saveTest()
{
    logStats('create a cat with a name and insert it into the database');
    $data = getDataObject();
    $cat = new Cat(['name' => 'Garfield', 'age' => 5, 'favoriteFood' => 'Lasagne']);
    $data->beginTran();
    $data->insert($cat);
    if (!$data->commit()) {
        $data->rollback();
    }

    logStats('create a dog with a name and insert it into the database');
    $dog = new Dog(['name' => 'Lucky', 'age' => 7, 'favoriteFood' => 'pigears']);
    $data->beginTran();
    $data->insert($dog);
    if (!$data->commit()) {
        $data->rollback();
    }

}

/**
 * Create a few creatures and add them to the pet shop
 *
 * @return bool
 * @throws Exception
 */
function savePetShop()
{
    logStats('create three nameless cats');
    logStats('create three nameless dogs');
    @$objects = [
        new Cat(),
        new Cat(),
        new Cat(),
        new Dog(),
        new Dog(),
        new Dog()
    ];

    logStats('insert all six pets into the database');
    logStats('guarantee all the pets are persisted');

    $data = getDataObject();
    $data->beginTran();
    foreach ($objects as $object) {
        if ($data->insert($object) === false) {
            return $data->rollback();
        }
    }

    return $data->commit();
}

/**
 * Writes the given message to STDOUT
 *
 * @param null $msg
 */
function logStats($msg = null)
{
    if (is_null($msg)) {
        $msg = 'print interesting information about the script\'s execution results to STDOUT';
    }
    fwrite(STDOUT, $msg . PHP_EOL);
}