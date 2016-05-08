<?php
/**
 * ERRORS AND EXCEPTIONS
 * Do extend from Throwable interface which allows to be caught
 * Etc, probably a really bad idea in general to catch them but useful in some cases.
 * Like you may wanna log the error differently in certain cases, like display the whole message or simply ignore some of them
 * Exceptions and Errors implement Throwable interface but the have different branches so if you ar just catching Exception nothing
 * needs to be updated.
 * http://php.net/manual/en/class.throwable.php
*/

/*
 * This will only happen if it is within a try catch, otherwise it will throw a fatal error.
*/

function sumFloats(float $first, float $second) : float
{
    throw new Exception("Error Processing Request");

    return $first + $second;
}


try {
    sumFloats(1, 2);
}
catch(Exception $exception) {
    var_dump('This is an exception');
    var_dump($exception->getMessage());
}
catch (TypeError $error) {
    var_dump('This is a type error');
    var_dump($error->getMessage());
}
catch (Error $error) {
    var_dump('This is an error');
    var_dump($error->getMessage());
}
