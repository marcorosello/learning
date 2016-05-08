<?php
/*
* Uniform Variable Syntax
*/

class User {
    public $name = 'Marco Rosello';

    public function getCompanies() {
        return ['Boozt', 'Estina'];
    }
}

$user = new User;

$property = [ 'first' => 'name'];

/*
 * Before php 5 you could do this
 * It won't check the array first and then get that value of the class
*/
var_dump($user->$property['first']);

/*
 * In php 7 it will try to get the property of the user, so it needs curlies to
 * find the value of the array first, the same like mathematical
*/
var_dump($user->{$property['first']});

/*
 * However you can still access an array returned by a function
*/
var_dump($user->getCompanies()[0]);
