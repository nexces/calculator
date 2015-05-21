<?php
/**
 * Created by PhpStorm.
 * User: Adrian 'Nexces' Piotrowicz
 * Date: 21.05.15
 * Time: 12:35
 */

namespace Nexces\Test\Calculator;


use Nexces\Calculator\Div;

class DivTest extends \PHPUnit_Framework_TestCase {
    public function testDiv()
    {
        $calculator = new Div();
        $calculator->setStorageDsn('sqlite::memory:');
        $calculator->appendValue(6);
        $calculator->appendValue(2);
        $this->assertEquals(3, $calculator->calculate(), 'I cannot divide :|');
    }
}
