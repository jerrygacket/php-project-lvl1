<?php

namespace Brain\Games\Game\Calc;

use function Brain\Games\Engine\playGame;
use function Brain\Games\Engine\startGame;

function getQuiz(): string
{
    $first = rand(1, 100);
    $second = rand(1, 100);
    switch (rand(0, 2)) {
        case 0:
            $action = '+';
            break;
        case 1:
            $action = '-';
            break;
        case 2:
            $action = '*';
            break;
    }
    return implode(' ', compact('first', 'action', 'second'));
}

function checkAnswer(string $question): string
{
    $matches = [];
    $p = '';
    if (preg_match('/(\d+)(?:\s*)([\+\-\*\/])(?:\s*)(\d+)/', $question, $matches) !== false) {
        $operator = $matches[2];

        switch ($operator) {
            case '+':
                $p = (int) $matches[1] + (int) $matches[3];
                break;
            case '-':
                $p = (int) $matches[1] - (int) $matches[3];
                break;
            case '*':
                $p = (int) $matches[1] * (int) $matches[3];
                break;
            case '/':
                $p = (int) $matches[1] / (int) $matches[3];
                break;
        }
    }

    return strval($p);
}

function beginGame()
{
    $name = \Brain\Games\Cli\hello();
    startGame('What is the result of the expression?');
    playGame($name, 'Calc');
}
