<?php
/**
 * Created by PhpStorm.
 * User: Adrian 'Nexces' Piotrowicz
 * Date: 21.05.15
 * Time: 09:34
 */

namespace Nexces\Calculator;


class Base {
    protected $values;
    protected $storageDsn = 'sqlite:example.db';

    /**
     * @param mixed $storageDsn
     */
    public function setStorageDsn($storageDsn)
    {
        $this->storageDsn = $storageDsn;
    }

    function __construct()
    {
        $this->values = array();
    }


    public function appendValue($value)
    {
        if (!is_numeric($value)) {
            throw new \InvalidArgumentException('Argument nie jest liczbą!');
        }
        $this->values[] = $value;
    }

    public function store($result)
    {
        $pdo = new \PDO($this->storageDsn);
        $query = "CREATE TABLE IF NOT EXISTS calc (operation VARCHAR(20), arguments TEXT, result FLOAT )";
        $pdo->query($query);
        $query = sprintf(
            "INSERT INTO calc VALUES ('%s', '%s', %f)",
            get_class($this),
            json_encode($this->values),
            $result
        );
        $pdo->query($query);
    }
}
