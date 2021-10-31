<?php

namespace Brain\Games\Game\Prime;

use function Brain\Games\Engine\playGame;
use function Brain\Games\Engine\startGame;
use function Brain\Games\Functions\isPrimeCheck;

function getQuiz(): string
{
    return rand(1, 100);
}

function checkAnswer($question): string
{
    return isPrimeCheck(intval($question)) ? 'yes' : 'no';
}


function beginGame()
{
    $name = \Brain\Games\Cli\hello();
    startGame('Answer "yes" if given number is prime. Otherwise answer "no".');
    playGame($name, 'Prime');
}
