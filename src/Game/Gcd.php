<?php

namespace Brain\Games\Game\Gcd;

use function Brain\Games\Engine\playGame;
use function Brain\Games\Engine\startGame;
use function Brain\Games\Functions\gcd;

function getQuiz(): string
{
    $first = rand(1, 100);
    $second = rand(1, 100);

    return implode(' ', compact('first', 'second'));
}

function checkAnswer(string $question): string
{
    $matches = explode(' ', $question);

    return strval(gcd(intval($matches[0]), intval($matches[1])));
}

/**
 * @return void
 */
function beginGame()
{
    $name = \Brain\Games\Cli\hello();
    startGame('Find the greatest common divisor of given numbers.');
    playGame($name, 'Gcd');
}
