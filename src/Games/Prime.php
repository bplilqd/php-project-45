<?php

namespace BrainPrime\Games\Prime;

use function cli\line;
use function cli\prompt;
use function FunctionLogic\Logic\checkAnswer;
use function FunctionLogic\Logic\justNumber;

function question(string $name): void
{
    $roundsCount = 3;

    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    for ($i = 0; $i < $roundsCount; $i++) {
        $number = random_int(0, 99);

        line("Question: {$number}");
        $answer = prompt('Your answer');

        $correctAnswer = justNumber($number) ? 'yes' : 'no';

        if (!checkAnswer($correctAnswer, $answer, $name)) {
            // Неправильный ответ — игра закончена
            return;
        }
    }

    line("Congratulations, {$name}!");
}
