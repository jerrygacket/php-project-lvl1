<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function hello()
{
    line('');
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}

function startGame()
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
}

function getNumber()
{
    return rand(1, 100);
}

function checkNumber($num)
{
    return ($num % 2) === 0 ? 'yes' : 'no';
}
