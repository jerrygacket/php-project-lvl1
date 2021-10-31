<?php

namespace Brain\Games\Functions;

function gcd(int $a, int $b): int
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}

function getProgression(int $begin, int $length, int $step): array
{
    $result[0] = $begin;
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
        return true;
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
