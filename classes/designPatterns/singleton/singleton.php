<?php
//is used to instantiate a class only for one time. constructcor and __clone must be private
//now if we do Logger::getInstance(); we will see only one message "instance created"
class Logger{
    static private $instance = NULL;
    
    static function getInstance(){
        if(self::$instance == NULL)
            self::$instance = new Logger ();
        
        return self::$instance;
    }
    
    private function __construct() {
        echo "instance created";
    }
    
    private function __clone() {
        
    }
    
    function Log($str){//Take care of logging
        echo $str;
    }
}
Logger::getInstance()->Log("checkpoint");
?>