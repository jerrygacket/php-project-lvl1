<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

/**
 * @param string $greetings
 * @return void
 */
function startGame(string $greetings)
{
    line($greetings);
}

/**
 * @param string $name
 * @param string $game
 * @return void
 */
function playGame(string $name, string $game)
{
    for ($i = 0; $i < 3; $i++) {
        $getQuiz = '\\Brain\\Games\\Game\\' . $game . '\\getQuiz';
        $checkAnswer = '\\Brain\\Games\\Game\\' . $game . '\\checkAnswer';
        $question = is_callable($getQuiz) ? $getQuiz() : '';
        line('Question: ' . $question);
        $answer = prompt('Your answer');
        $correctAnswer = is_callable($checkAnswer) ? $checkAnswer($question) : null;
        if ($correctAnswer !== $answer) {
            falseAnswer($answer, $correctAnswer, $name);
        }
        line('Correct!');
    }
    endGame($name);
}

/**
 * @param string $answer
 * @param string $correctAnswer
 * @param string $name
 * @return void
 */
function falseAnswer(string $answer, string $correctAnswer, string $name)
{
    line("$answer is wrong answer ;(. Correct answer was $correctAnswer.\nLet's try again, $name!");
    exit;
}

/**
 * @param $name
 * @return void
 */
function endGame($name)
{
    line("Congratulations, $name!");
    exit;
}
