<?php

namespace BrainCalc\Games\Calc;

use function cli\line;
use function cli\prompt;
use function FunctionLogic\Logic\checkAnswer;

function multiplyMinusAdd(int $first_number, string $Methods, int $second_number): int
{
    $answer = 0;
    switch ($Methods) {
        case '+':
            $answer = $first_number + $second_number;
            break;
        case '-':
            $answer = $first_number - $second_number;
            break;
        case '*':
            $answer = $first_number * $second_number;
            break;
    }
    return $answer;
}

function question(string $name, array $arrayMethods): void
{
    $roundsCount = 3;

    line('What is the result of the expression?');

    for ($i = 0; $i < $roundsCount; $i++) {
        $resultArray = questionOnSumm($arrayMethods);
        line("Question: {$resultArray[0]} {$resultArray[1]} {$resultArray[2]}");
        $answer = prompt('Your answer');

        $correctAnswer = multiplyMinusAdd($resultArray[0], $resultArray[1], $resultArray[2]);

        if (!checkAnswer($correctAnswer, $answer, $name)) {
            // Неправильный ответ — игра закончена
            return;
        }
    }

    line("Congratulations, {$name}!");
}

function questionOnSumm(array $arrayMethods): array
{
    $first_number = random_int(0, 10);
    $second_number = random_int(0, 10);
    $method = $arrayMethods[mt_rand(0, 2)];
    return [$first_number, $method, $second_number];
}
