<?php
class Logger{
    static private $instance = NULL;
    
    static function getInstance(){
        if(self::$instance == NULL)
            self::$instance = new Logger ();
        
        return self::$instance;
    }
    
    private function __construct() {
        
    }
    
    private function __clone() {
        
    }
    
    function Log($str){//Take care of logging
        echo $str;
    }
}
Logger::getInstance()->Log("checkpoint");
?>