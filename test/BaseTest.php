<?php
/**
 * Created by PhpStorm.
 * User: Adrian 'Nexces' Piotrowicz
 * Date: 21.05.15
 * Time: 11:57
 */

namespace Nexces\Test\Calculator;


use Nexces\Calculator\Base;

class BaseTest extends \PHPUnit_Framework_TestCase
{
    public function testDsnSetting()
    {
        $calc = new Base();
        $reflection = new \ReflectionClass($calc);

        $storageDsn = 'sqlite::memory:';
        $calc->setStorageDsn($storageDsn);
        $storageDsnProperty = $reflection->getProperty('storageDsn');
        $storageDsnProperty->setAccessible(true);
        // dsn is stored properly
        $this->assertEquals(
            $storageDsn,
            $storageDsnProperty->getValue($calc)
        )
        ;
    }

    public function testAppendValue()
    {
        $calc = new Base();
        $calc->appendValue(1);
        $calc->appendValue(2);
        $calc->appendValue(1);
        $reflection = new \ReflectionClass($calc);
        $valuesProperty = $reflection->getProperty('values');
        $valuesProperty->setAccessible(true);
        $actualValues = $valuesProperty->getValue($calc);
        $expectedValues = array(1, 2, 1);
        // values are appended correctly
        $this->assertEquals(
            $expectedValues,
            $actualValues
        )
        ;
    }

    public function testResultStorage()
    {
        $calc = new Base();
        $storageDsn = 'sqlite:test.db';
        $pdo = new \PDO($storageDsn);
        $pdo->query('DELETE FROM calc');
        $calc->setStorageDsn($storageDsn);
        $calc->appendValue(1);
        $calc->store(0);
        $statement = $pdo->query('SELECT COUNT(*) FROM calc');
        $result = $statement->fetchColumn(0);
        // there is one row stored
        $this->assertEquals(
            1,
            $result,
            'Invalid number of operations stored?'
        )
        ;

        $statement = $pdo->query('SELECT * FROM calc');
        $row = $statement->fetch(\PDO::FETCH_ASSOC);

        // operation contains same class name as object
        $this->assertEquals(
            get_class($calc),
            $row['operation'],
            'Bad operation stored'
        )
        ;
        // arguments are json object of array containing value 1
        $this->assertEquals(
            json_encode(array(1)),
            $row['arguments'],
            'Arguments are not properly stored'
        )
        ;
        // result is set to 0
        $this->assertEquals(
            0,
            $row['result'],
            'Stored result is not valid'
        )
        ;
        unlink('test.db');
    }
}
