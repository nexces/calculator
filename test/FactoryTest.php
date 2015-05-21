<?php
/**
 * Created by PhpStorm.
 * User: Adrian 'Nexces' Piotrowicz
 * Date: 21.05.15
 * Time: 12:37
 */

namespace Nexces\Test\Calculator;


use Nexces\Calculator\Factory;

class FactoryTest extends \PHPUnit_Framework_TestCase {
    public function testFactory()
    {
        $this->assertInstanceOf('\Nexces\Calculator\Sum', Factory::factory('sum'));
        $this->assertInstanceOf('\Nexces\Calculator\Sub', Factory::factory('sub'));
        $this->assertInstanceOf('\Nexces\Calculator\Mul', Factory::factory('mul'));
        $this->assertInstanceOf('\Nexces\Calculator\Div', Factory::factory('div'));
        $this->assertInstanceOf('\Nexces\Calculator\Noop', Factory::factory('noop'));
    }
}
