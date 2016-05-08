<?php
declare(strict_types=1);

/*
 * Anonymous classes
 * Useful testing but not always good idea in production.
*/

$user = new class {
    public function getName()
    {
        return 'Marco';
    }
};

/*
 * Null Coalesce operator
 * It will return the first not null element
*/

$name = $_GET['name'] ?? $user->getName() ?? 'Default Name';
// var_dump($name);
