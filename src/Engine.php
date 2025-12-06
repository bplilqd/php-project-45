<?php

namespace FunctionLogic\Logic;

use function cli\line;

function echoIsWrongAnswer(string $answer, string $correct, string $name): void
{
    line("'{$answer}' is wrong answer ;(. Correct answer was '{$correct}'.");
    line("Let's try again, {$name}!");
}

function checkToEven(int $number): bool
{
    return $number % 2 === 0;
}

function checkAnswer(string $correct, string $answer, string $name): bool
{
    if ($answer === $correct) {
        line('Correct!');
        return true;
    }

    echoIsWrongAnswer($answer, $correct, $name);

    return false;
}

function justNumber(int $number): bool
{
    if ($number < 2) {
        return false;
    } elseif ($number === 2) {
        return true;
    } elseif ($number % 2 === 0) {
        return false;
    } else {
        $sqrt = round(sqrt($number));
        $i = 3;
        while ($i <= $sqrt) {
            if ($number % $i === 0) {
                return false;
            }
            $i += 2;
        }
        return true;
    }
}
