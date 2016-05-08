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
// var_dump(sumInts(1, 2));
function sumInts(int $first, int $second) : int
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

/**
* New paradigm about returning values, is we would need to throw new exceptions if we do not find a specific values
* for example if a funtion return a User and you check in the database that specific user and it is not there
* you can't return null, that may change in future version, but not clear yet.
* There is a propose to allow null return but it is not sure it will make it for 7.1 relase
*/

class User
{
    public function getName()
    {
        return 'Marco';
    }
}

function getUser() : User
{
    //query to DB and no user found
    return null;
}

if($user = getUser()) {
    print $user->getName();
}
