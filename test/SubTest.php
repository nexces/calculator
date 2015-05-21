<?php
/**
 * Created by PhpStorm.
 * User: Adrian 'Nexces' Piotrowicz
 * Date: 21.05.15
 * Time: 12:33
 */

namespace Nexces\Test\Calculator;


use Nexces\Calculator\Sub;

class SubTest extends \PHPUnit_Framework_TestCase
{
    public function testSub()
    {
        $calculator = new Sub();
        $calculator->setStorageDsn('sqlite::memory:');
        $calculator->appendValue(3);
        $calculator->appendValue(2);
        $this->assertEquals(
            1,
            $calculator->calculate(),
            'I cannot subtract :|'
        )
        ;
    }
}
