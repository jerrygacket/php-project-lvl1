<?php

namespace Brain\Games\Game\Even;

use function Brain\Games\Engine\startGame;
use function Brain\Games\Engine\playGame;

function getQuiz(): int
{
    return rand(1, 100);
}

function checkAnswer(int $question): string
{
    return ($question % 2) === 0 ? 'yes' : 'no';
}

/**
 * @return void
 */
function beginGame()
{
    $name = \Brain\Games\Cli\hello();
    startGame('Answer "yes" if the number is even, otherwise answer "no".');
    playGame($name, 'Even');
}
