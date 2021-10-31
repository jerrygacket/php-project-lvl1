<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function startGame(string $greetings)
{
    line($greetings);
}

function playGame(string $name, string $game)
{
    for ($i = 0; $i < 3; $i++) {
        $getQuiz = '\\Brain\\Games\\Game\\' . $game . '\\getQuiz';
        $checkAnswer = '\\Brain\\Games\\Game\\' . $game . '\\checkAnswer';
        $question = $getQuiz();
        line('Question: ' . $question);
        $answer = prompt('Your answer');
        $correctAnswer = $checkAnswer($question);
        if ($correctAnswer !== $answer) {
            falseAnswer($answer, $correctAnswer, $name);
        }
        line('Correct!');
    }
    endGame($name);
}

function falseAnswer(string $answer, string $correctAnswer, string $name)
{
    line("$answer is wrong answer ;(. Correct answer was $correctAnswer.\nLet's try again, $name!");
    exit;
}

function endGame($name)
{
    line("Congratulations, $name!");
    exit;
}
