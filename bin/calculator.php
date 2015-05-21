<?php
/**
 * Created by PhpStorm.
 * User: Adrian 'Nexces' Piotrowicz
 * Date: 21.05.15
 * Time: 09:38
 */

require_once dirname(realpath(__FILE__)) . '/../vendor/autoload.php';

use League\CLImate\CLImate;
use Nexces\Calculator\Factory;

$cli = new CLImate();

$cli->green()
    ->output('Witaj w kalkulatorze!')
;

$options = array(
    'sum' => 'Dodawanie',
    'sub' => 'Odejmowanie',
    'mul' => 'Mnożenie',
    'div' => 'Dzielnie'
);

$input = $cli->radio(
    'Wybierz rodzaj operacji',
    $options
)
;

$response = $input->prompt();
if ($response === null) {
    $response = 'noop';
}
$calculator = Factory::factory($response);

do {
    $input = $cli->input('Podaj liczbę (lub wpisz "c" aby dokonać obliczenia): ');
    $response = $input->prompt();
    if ($response === 'c') {
        continue;
    }
    try {
        $calculator->appendValue($response);
    } catch (\InvalidArgumentException $e) {
        $cli->error('Podana została nieprawidłowa wartość!');
    }
} while ($response != 'c');

$cli->green('Wynik działania: ' . $calculator->calculate());
