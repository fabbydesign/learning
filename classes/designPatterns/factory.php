<?php
abstract class User{
    protected $name = null;
    
    function __construct($name){
        $this->name = $name;
    }
    
    function getName(){
        return $this->name;
    }
    
    function hasReadPermission(){
        return true;
    }
    
    function hasModifyPermission(){
        return false;
    }
    
    function hasDeletePermission(){
        return false;
    }
    function wantsFlashInterface(){
        return true;
    }
}

class GuestUser extends User{}

class CustomerUser extends User{
    function hasModifyPermission() {
        return true;
    }
}

class AdminUser extends User{
    function hasModifyPermission() {
        return true;
    }
    function hasDeletePermission() {
        return true;
    }
    function wantsFlashInterface() {
        return false;
    }
}

class UserFactory{
    private static $users = array(
        "Andi" => "admin",
        "Stig" => "guest",
        "Derick" => "customer",
    );
    static function Create($name){
        if(!isset(self::$users[$name])){
            die('error');
        }
        
        switch(self::$users[$name]){
            case "guest": return new GuestUser($name);
            case "customer": return new CustomerUser($name);
            case "admin": return new AdminUser($name);
            case "default": die('error');
        }
    }
}

function boolToStr($b){
    if($b == true)
        return "Yes";
    else
        return "No";
}

function displayPermissions(User $obj){
    print $obj->getName()." permissions: ";
    print "Read: ".boolToStr($obj->hasReadPermission())."<br />";
    print "Modify: ".boolToStr($obj->hasModifyPermission())."<br />";
    print "Delete: ".boolToStr($obj->hasDeletePermission())."<br />";
}

function displayRequirements(User $obj){
    if($obj->wantsFlashInterface())
        print $obj->getName ()."requires Flash<br>";
}
    
$logins = array("Andi","Stig","Derick");
foreach($logins as $login){
    displayPermissions(UserFactory::Create($login));
    displayRequirements(UserFactory::Create($login));
}

?>