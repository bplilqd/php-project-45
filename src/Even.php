<?php

namespace BrainEven\Even;

use function cli\line;
use function cli\prompt;

function question(string $name): void
{
    $roundsCount = 3;

    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 0; $i < $roundsCount; $i++) {
        $number = mt_rand(0, 99);

        line("Question: {$number}");
        $answer = prompt('Your answer');

        $correctAnswer = checkToEven($number) ? 'yes' : 'no';

        if (!checkAnswer($correctAnswer, $answer, $name)) {
            // Неправильный ответ — игра закончена
            return;
        }
    }

    line("Congratulations, {$name}!");
}

function checkAnswer(string $correct, string $answer, string $name): bool
{
    if ($answer === $correct) {
        line('Correct!');
        return true;
    }

    line("'{$answer}' is wrong answer ;(. Correct answer was '{$correct}'.");
    line("Let's try again, {$name}!");

    return false;
}

function checkToEven(int $number): bool
{
    return $number % 2 === 0;
}
