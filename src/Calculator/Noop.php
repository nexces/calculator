<?php
/**
 * Created by PhpStorm.
 * User: Adrian 'Nexces' Piotrowicz
 * Date: 21.05.15
 * Time: 09:33
 */

namespace Nexces\Calculator;

class Noop extends Base implements OperationInterface {
    public function calculate()
    {
        return 0;
    }
}
