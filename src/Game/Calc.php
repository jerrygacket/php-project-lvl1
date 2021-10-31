<?php

namespace Brain\Games\Game\Calc;

use function Brain\Games\Engine\playGame;
use function Brain\Games\Engine\startGame;

function getQuiz()
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

function checkAnswer($question)
{
    $matches = [];
    $p = '';
    if (preg_match('/(\d+)(?:\s*)([\+\-\*\/])(?:\s*)(\d+)/', $question, $matches) !== false) {
        $operator = $matches[2];

        switch ($operator) {
            case '+':
                $p = $matches[1] + $matches[3];
                break;
            case '-':
                $p = $matches[1] - $matches[3];
                break;
            case '*':
                $p = $matches[1] * $matches[3];
                break;
            case '/':
                $p = $matches[1] / $matches[3];
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
