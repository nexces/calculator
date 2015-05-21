<?php
/**
 * Created by PhpStorm.
 * User: Adrian 'Nexces' Piotrowicz
 * Date: 21.05.15
 * Time: 09:33
 */

namespace Nexces\Calculator;

class Div extends Base implements OperationInterface {
    public function calculate()
    {
        $values = $this->values;
        $result = array_shift($values);
        foreach ($values as $value) {
            $result /= $value;
        }
        $this->store($result);
        return $result;
    }
}
