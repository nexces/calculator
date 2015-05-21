<?php
/**
 * Created by PhpStorm.
 * User: Adrian 'Nexces' Piotrowicz
 * Date: 21.05.15
 * Time: 12:34
 */

namespace Nexces\Test\Calculator;


use Nexces\Calculator\Mul;

class MulTest extends \PHPUnit_Framework_TestCase
{
    public function testMul()
    {
        $calculator = new Mul();
        $calculator->setStorageDsn('sqlite::memory:');
        $calculator->appendValue(2);
        $calculator->appendValue(3);
        $this->assertEquals(
            6,
            $calculator->calculate(),
            'I cannot multiply :|'
        )
        ;
    }
}
