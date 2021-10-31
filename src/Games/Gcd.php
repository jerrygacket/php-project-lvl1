<?php

namespace Brain\Games\Games\Gcd;

use function Brain\Games\Engine\playGame;
use function Brain\Games\Engine\startGame;

function getQuiz()
{
    $first = rand(1, 100);
    $second = rand(1, 100);

    return implode(' ', compact('first', 'second'));
}

function checkAnswer($question)
{
    $matches = explode(' ', $question);


    return strval(gcd($matches[0], $matches[1]));
}

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}

function beginGame()
{
    $name = \Brain\Games\Cli\hello();
    startGame('Find the greatest common divisor of given numbers.');
    playGame($name, 'Gcd');
}
