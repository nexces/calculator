<?php
/**
 * Created by PhpStorm.
 * User: Adrian 'Nexces' Piotrowicz
 * Date: 21.05.15
 * Time: 09:33
 */

namespace Nexces\Calculator;

class Factory {
    private static $operations = array(
        'noop',
        'sum',
        'sub',
        'mul',
        'div'
    );
    public static function factory($operation) {
        if (!in_array($operation, self::$operations)) {
            throw new \InvalidArgumentException('Nieprawidłowa operacja!');
        }
        switch ($operation) {
            case 'sum':
                return new Sum();
                break;
            case 'sub':
                return new Sub();
                break;
            case 'mul':
                return new Mul();
                break;
            case 'div':
                return new Div();
                break;
            default:
                return new Noop();
        }
    }
}
