<?php
error_reporting(E_ALL^E_NOTICE);

// public The resource can be accessed fromany scope.
// protected The resource can only be accessed from within the class where it is defined and its descendants.
// private The resource can only be accessed from within the class where it is defined.
// final The resource is accessible from any scope, but cannot be overridden in descendant classes.

class foo {
    function __construct()
    {
        echo __METHOD__; //show foo::__construct
    }
    function __destruct(){
        echo " ".__METHOD__;//foo::__destruct
    }
    function foo()
    {
    // PHP 4 style constructor
    }
}
//new foo();//show foo::__construct foo::__destruct


class foo1 {
    const BAR = "Hello World";
}
//echo foo1::BAR; // echo the constant


//ABSTRACT CLASS
//An abstract class essentially defines the basic skeleton of a specific type of encapsulated entity—for example, 
//you can use an abstract class to define the basic concept of “car” as having two doors, a lock and a method that locks 
//or unlocks the doors. Abstract classes cannot be used directly, but they must be extended so that the descendent 
//class provides a full complement of methods.
//has to have at least one abstract method

abstract class DataStore_Adapter {
    private $id;
    
    abstract function insert();
    abstract function update();
    public function save()
    {
        if (!is_null($this->id)) 
            $this->update();
        else
            $this->insert();

    }
}

class PDO_DataStore_Adapter extends DataStore_Adapter {
    function insert()
    {
        // ...
    }
    function update()
    {
        // ...
    }
}


//interfaces
//on the extended class, you have to create all the declarations that interface class has! it is mandatory!
interface DataStore_Adapter1 {
    public function insert();
    public function update();
    public function save();
    public function newRecord($name = null);
}
class PDO_DataStore_Adapter1 implements DataStore_Adapter1 {
    public function insert()
    {
    // ...
    }
    public function update()
    {
    // ...
    }
    public function save()
    {
    // ...
    }
    public function newRecord($name = null)
    {
    }
}

//It is also possible to implement more than one interface in the same class:
//class PDO_DataStore_Adapter1 implements DataStore_Adapter, SeekableIterator {
    // ...
//}

//determine if an given object is an instance of a class
if ($obj instanceof MyClass) {
    echo "\$obj is an instance of MyClass";
}


//autoload
function __autoload($class){
    require_once str_replace("_", "/", $class).".php";
}
new Some_Class(); //php is trying to include Some/Class.php but will give an error because file don't exists


//Reflections
function hello($to = "World")
{
    echo "Hello $to";
}


//get the internal functions of php - standard and my functions declared
$funcs = get_defined_functions();
echo"<pre>";
var_dump($funcs);
echo"</pre>";

?>