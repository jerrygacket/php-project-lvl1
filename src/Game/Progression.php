<?php

namespace Brain\Games\Game\Progression;

use function Brain\Games\Engine\playGame;
use function Brain\Games\Engine\startGame;
use function Brain\Games\Functions\getProgression;

function getQuiz(): string
{
    $begin = rand(1, 100);
    $length = rand(5, 10);
    $step = rand(1, 5);

    $progression = getProgression($begin, $length, $step);
    // не подменяем послед
    $delKey = rand(min(array_keys($progression)) + 1, max(array_keys($progression)) - 1);
    $progression[$delKey] = '..';

    return implode(' ', $progression);
}

function checkAnswer(string $question): string
{
    $matches = explode(' ', $question);
    $length = count($matches);
    $step = ($matches[$length - 1] - $matches[0]) / ($length - 1);
    $realQuestion = getProgression($matches[0], count($matches), $step);
    foreach ($matches as $key => $item) {
        if ($item === '..') {
            return strval($realQuestion[$key]);
        }
    }

    return '';
}

function beginGame()
{
    $name = \Brain\Games\Cli\hello();
    startGame('What number is missing in the progression?');
    playGame($name, 'Progression');
}
