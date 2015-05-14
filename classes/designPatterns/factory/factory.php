<?php

interface Shape{
      public function draw();
}
class Position {}
class Rectangle implements Shape{
      private $position;
      
      public function __construct($pos){
            $this->position = $pos;
      }
      
      public function draw() {
            echo "drawing rectangle";
      }
}

class ShapeFactory{
      public function create($type){
            if($type == "rectangle")
                  return new Rectangle (new Position());
      }
}

$factory = new ShapeFactory();
echo $factory->create("rectangle")->draw();
?>