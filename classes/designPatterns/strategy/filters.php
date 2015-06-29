<?php
/*
 * The strategy pattern is intended to provide a means to define a family of algorithms, encapsulate each one as an object, 
 * and make them interchangeable. The strategy pattern lets the algorithms vary independently from clients that use them.
 * 
 * Strategy design patterns is a behavioral design pattern that allow you select a algorithm from the available 
 * algorithms at the runtime
 * 
 * Example below find users from an array depending of the search algorithm
 */

interface IStrategy{
      public function filter(array $items);
}

class filterByFirstName implements IStrategy{
      private $_firstLetter;
      private $_return = array();
      public function __construct($firstLetter){
            $this->_firstLetter = $firstLetter;
      }
      //algorithm here
      public function filter(array $items){
            foreach($items as $item){
                  if(substr($item,0,1) == $this->_firstLetter) {
                          $this->_return[] = $item;
                  }
            }
            return $this->_return;
      }
}

class searchInString implements IStrategy{
      private $_toFind;
      private $_return = array();
      public function __construct($toFind){
            $this->_toFind = $toFind;
      }
      //algorithm here
      public function filter(array $items){
            foreach($items as $item){
                  if(preg_match("/".$this->_toFind."/",$item))
                          $this->_return[] = $item;
            }
            return $this->_return;
      }
}

class userList{
      private $_names;
      private $_return;
      
      public function __construct(array $names){
            $this->_names = $names;
      }
      
      public function find(IStrategy $operation){
            $this->_return = $operation->filter($this->_names);
      }
      
      public function __toString() {
            return implode(",",$this->_return);
      }
}

$names = array("Georgiana","Irin","Ady","Elena","Ramona","Rosma");
$userList = new userList($names);
$userList -> find(new filterByFirstName("R"));
//echo $userList;

$names = array("Georgiana","Irin","Ady","Elena","Ramona","Rosma");
$userList = new userList($names);
$userList -> find(new searchInString("na"));
echo $userList;