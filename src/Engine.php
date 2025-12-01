<?php

namespace FunctionLogic\Logic;

use function cli\line;
//use function cli\prompt;

function EchoIsWrongAnswer($answer, $correct, $name): void
{
    line("'{$answer}' is wrong answer ;(. Correct answer was '{$correct}'.");
    line("Let's try again, {$name}!");
}
