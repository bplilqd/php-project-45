<?php

namespace BrainEven\Even;

use function cli\line;
use function cli\prompt;

function question($name): void
{
    $number = mt_rand(0, 99);
    $goodbay = "Answer 'yes' is wrong answer ;(. Correct answer was 'no'.\nLet's try again, " . $name;
    $correct = "Correct!";
    $congratulations = "Congratulations, " . $name;
    line('Answer "yes" if the number is even, otherwise answer "no".');
    // for from thre
    $answer = prompt("Question: {$number}\nYour answer:");
}

function checkToEven($number): bool
{
    return ($number % 2 === 0) ?? false;
}
