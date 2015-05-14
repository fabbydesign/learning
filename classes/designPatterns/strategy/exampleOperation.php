<?php
//calculator -> operation -> sum | diff | *

interface Operation{
      public function calculate(array $numbers);
}

class Add implements Operation{
      public function calculate(array $numbers){
            $return = 0;
            foreach($numbers as $item){
                  $return+=$item;
            }
            
            return $return;
      }
}
class Multi implements Operation{
      public function calculate(array $numbers){
            $return = 1;
            foreach($numbers as $item)
                  $return*=$item;
            
            return $return;
      }
}

class Calculator{
      private $_operation;
      private $_numbers = array();
      private $_total = '0';
      public function __construct(array $numbers) {
            $this->_numbers = $numbers;
      }
      
      public function operation(Operation $operation){
            $this->_operation = $operation;
      }
      public function calculate(){
            $this->_total = (string)$this->_operation->calculate($this->_numbers);
      }
      public function __toString(){
            return $this->_total;
      }
}

$numbers = array(8,5);
$calc = new Calculator($numbers);
$calc -> operation(new Multi());
$calc -> calculate();
echo $calc;