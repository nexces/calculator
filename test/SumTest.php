<?php
/**
 * Created by PhpStorm.
 * User: Adrian 'Nexces' Piotrowicz
 * Date: 21.05.15
 * Time: 11:35
 */

namespace Nexces\Test\Calculator;


use Nexces\Calculator\Sum;

class SumTest extends \PHPUnit_Framework_TestCase
{
    public function testSum()
    {
        $calculator = new Sum();
        $calculator->setStorageDsn('sqlite::memory:');
        $calculator->appendValue(2);
        $calculator->appendValue(3);
        $this->assertEquals(
            5,
            $calculator->calculate(),
            'I cannot add :|'
        )
        ;
    }
}
