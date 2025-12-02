<?php

namespace BrainEven\Games\Even;

use function cli\line;
use function cli\prompt;
use function FunctionLogic\Logic\checkAnswer;
use function FunctionLogic\Logic\checkToEven;

function question(string $name): void
{
    $roundsCount = 3;

    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 0; $i < $roundsCount; $i++) {
        $number = random_int(0, 99);

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
