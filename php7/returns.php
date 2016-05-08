<?php
declare(strict_types=1);

/**
 * New paradigm about returning values, is we would need to throw new exceptions if we do not find a specific values
 * for example if a function return a User and you check in the database that specific user and it is not there
 * you can't return null, that may change in future version, but not clear yet.
 * There is a propose to allow null return but it is not sure it will make it for 7.1 relase
 */
class UserNotFoundException extends \Exception {}

class User
{
    private $name;

    public function getName()
    {
        return $this->name;
    }

    public static function getCurrentUser() : User
    {
        //get user id and query to DB and user is not found
        return null;

        // one option is to return a new empty user
        return new User;

        // another option would be to throw an exception
        throw new UserNotFoundException('The current user couldn\'t be found');
    }

}

if($user = User::getCurrentUser()) {
    print $user->getName();
}


try {
    $user = User::getCurrentUser();
}
catch (UserNotFoundException $ex) {
    //do something else
    var_dump($ex->getMessage());
}

