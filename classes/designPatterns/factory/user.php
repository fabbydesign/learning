<?php
/*
 * For example, suppose you have a User class that reads from a file. You want to change it to a different class that reads 
 * from the database, but all the code references the original class that reads from a file. This is where the factory pattern 
 * comes in handy.
 * 
 * The factory pattern is a class that has some methods that create objects for you. Instead of using new directly, you use 
 * the factory class to create objects. That way, if you want to change the types of objects created, you can change just the 
 * factory. All the code that uses the factory changes automatically.
 * 
 * 
 */
interface IUser{
    function getName();
}

class User implements IUser{
    public function __construct($id) {}
    public function getName() {
        return "Jack";
    }
}

class UserFactory{
    public static function Create($id){
        return new User($id);
    }
}

$uo = UserFactory::Create(1);
echo $uo->getName();
?>