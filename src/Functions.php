<?php

namespace Brain\Games\Functions;

function gcd(int $a, int $b): int
{
    $result  = (bool) ($a % $b);
    return $result ? gcd($b, $a % $b) : $b;
}

function getProgression(int $begin, int $length, int $step): array
{
    $result = [$begin];
    $i = 1;
    while ($i < $length) {
        $result[$i] = $result[$i - 1] + $step;
        $i++;
    }

    return $result;
}

function isPrimeCheck(int $number): bool
{
    if ($number === 1) {
        return false;
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
