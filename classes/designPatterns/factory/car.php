<?php
class carFactory{
    
    public function __construct(){}
    
    public function build($type){
        if($type == '')
            throw new Exception("Invalid car Type");
        else{
            $className = 'car_'.ucfirst($type);
            if(class_exists($className))
                return new $className;
            else
                throw new Exception("Car type not found");
        }
    }
}

class car_Sedan{
    public function __construct() {
        echo "Creating Sedan";
    }
}

class car_Sub{
    public function __construct() {
        echo "Creating Sedan";
    }
}

carFactory::build("Sedan");
?>