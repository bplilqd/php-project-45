<?php

namespace BrainProgress\Games\Progress;

use function cli\line;
use function cli\prompt;
use function FunctionLogic\Logic\checkAnswer;

function elemetsForProgress(): array
{
    $longValueProgress = random_int(5, 10);
    $secretValueKey = random_int(0, $longValueProgress);
    $progressValue = random_int(2, 9); // шаг прогрессии
    $startValue  = random_int(0, 25);
    return [$longValueProgress, $secretValueKey, $progressValue, $startValue];
}

function creatingProgressArray(array $array): array
{
    $arrayResult = [];
    [$longValueProgress, $secretValueKey, $progressValue, $startValue] = $array;
    $value = $startValue;
    $answer = 0;
    for ($i = 0; $i <= $longValueProgress; $i++) {
        if ($i !== $secretValueKey) {
            $arrayResult[] = $value;
        } else {
            $arrayResult[] = '..';
            $answer = $value;
        }
        $value += $progressValue;
    }
    return [$arrayResult, $answer];
}

function question(string $name): void
{
    $roundsCount = 3;

    line('What number is missing in the progression?');

    for ($i = 0; $i < $roundsCount; $i++) {
        $array = elemetsForProgress();
        $arrayResult = creatingProgressArray($array);
        $printAnswer = implode(' ', $arrayResult[0]);

        line("Question: {$printAnswer}");
        $answer = prompt('Your answer');

        $correctAnswer = $arrayResult[1];

        if (!checkAnswer($correctAnswer, $answer, $name)) {
            // Неправильный ответ — игра закончена
            return;
        }
    }

    line("Congratulations, {$name}!");
}
