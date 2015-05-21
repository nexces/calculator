<?php
/**
 * Created by PhpStorm.
 * User: Adrian 'Nexces' Piotrowicz
 * Date: 21.05.15
 * Time: 09:33
 */

namespace Nexces\Calculator;

class Sum extends Base implements OperationInterface {
    public function calculate()
    {
        $result = 0;
        foreach ($this->values as $value) {
            $result += $value;
        }
        $this->store($result);
        return $result;
    }
}
