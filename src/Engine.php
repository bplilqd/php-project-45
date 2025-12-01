<?php

namespace FunctionLogic\Logic;

use function cli\line;

function EchoIsWrongAnswer($answer, $correct, $name): void
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

    EchoIsWrongAnswer($answer, $correct, $name);

    return false;
}
