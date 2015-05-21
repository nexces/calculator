<?php
/**
 * Created by PhpStorm.
 * User: Adrian 'Nexces' Piotrowicz
 * Date: 21.05.15
 * Time: 12:36
 */

namespace Nexces\Test\Calculator;


use Nexces\Calculator\Noop;

class NoopTest extends \PHPUnit_Framework_TestCase
{
    public function testNoop()
    {
        $calculator = new Noop();
        $this->assertEquals(
            0,
            $calculator->calculate(),
            'I cannot be lazy!'
        )
        ;
    }
}
