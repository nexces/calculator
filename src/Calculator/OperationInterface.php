<?php
/**
 * Created by PhpStorm.
 * User: Adrian 'Nexces' Piotrowicz
 * Date: 21.05.15
 * Time: 09:32
 */

namespace Nexces\Calculator;


interface OperationInterface {
    public function calculate();
    public function setStorageDsn($storageDsn);
    public function appendValue($value);
    public function store($result);
}
