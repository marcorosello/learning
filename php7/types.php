<?php
declare(strict_types=1);

/**
* PHP is still a loosely typed language and does coarsing (casting) by default.
* The features have been extended with full type hinting and return type hinting.
* But we still have dynamically-typed variables, like $a = [] and then $a = 1;
* You cannot define if the array needs to be of an specific type,
* like array of strings or int a = 2;
* they have a type depending on the value
*/

/**
 * Int can be considered a float but not viceversa
*/
// var_dump(sumFloats(1, 2));
function sumFloats(float $first, float $second) : float
{
    return (int) $first + $second;
}

// Not allow to pass a float instead of a int
// var_dump(sumIntegers(1, 2));
function sumIntegers(int $first, int $second) : int
{
    return $first + $second;
}

//It needs to be a string nothing else is accepted
// var_dump(returnString("123"));
function returnString(string $hello) : string
{
    // return $hello;
    return (int) $hello;
}

// integer 1 is not considered bool, it would need casting.
// var_dump(isTrue(1));
function isTrue(bool $return) : bool
{
    return $return;
}
