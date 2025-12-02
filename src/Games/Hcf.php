<?php

namespace BrainGcd\Games\Hcf;
use function cli\line;
use function cli\prompt;
use function FunctionLogic\Logic\checkAnswer;

function question(string $name): void
{
    $roundsCount = 3;

    line('Find the greatest common divisor of given numbers.');

    for ($i = 0; $i < $roundsCount; $i++) {
        $number = mt_rand(0, 999);
        $number2 = mt_rand(0, 999);

        line("Question: {$number} {$number2}");
        $answer = prompt('Your answer');

        $correctAnswer = getValueHcf([$number, $number2]);

        if (!checkAnswer($correctAnswer, $answer, $name)) {
            // Неправильный ответ — игра закончена
            return;
        }
    }

    line("Congratulations, {$name}!");
}

function getValueHcf(array $arrayNumbers): int
{
    $result = 0;

    $numFirst = max($arrayNumbers);
    $numSecond = min($arrayNumbers);

    if ($numFirst === 0 && $numSecond === 0) {
        return $result;
    }
    if ($numFirst === 0 || $numSecond === 0) {
        return $numFirst;
    }

    $amount = $numFirst;
    while ($amount !== 0) {
        $amount = $numFirst % $numSecond;
        $numFirst = $numSecond;
        $numSecond = $amount;
    }

    $result = $numFirst;
    return $result;
}
