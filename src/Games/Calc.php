<?php

namespace BrainCalc\Games\Calc;

use function cli\line;
use function cli\prompt;
use function FunctionLogic\Logic\checkAnswer;

function multiplyMinusAdd(int $firstNumber, string $methods, int $secondNumber): int
{
    $answer = 0;
    switch ($methods) {
        case '+':
            $answer = $firstNumber + $secondNumber;
            break;
        case '-':
            $answer = $firstNumber - $secondNumber;
            break;
        case '*':
            $answer = $firstNumber * $secondNumber;
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

        $correctAnswer = (string) multiplyMinusAdd($resultArray[0], $resultArray[1], $resultArray[2]);

        if (!checkAnswer($correctAnswer, $answer, $name)) {
            // Неправильный ответ — игра закончена
            return;
        }
    }

    line("Congratulations, {$name}!");
}

function questionOnSumm(array $arrayMethods): array
{
    $firstNumber = random_int(0, 10);
    $secondNumber = random_int(0, 10);
    $method = $arrayMethods[random_int(0, 2)];
    return [$firstNumber, $method, $secondNumber];
}
