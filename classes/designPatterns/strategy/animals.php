<?php
interface AnimalInterface{
	public function run();
}
 
class Dog implements AnimalInterface{
 
	public function run()
	{
		return 'running while barking';
	}
}
 
class Cat implements AnimalInterface{
 
	public function run()
	{
		return 'running while meowing';
	}
}
 
 
class Animal{
	protected $animal;
	public function __construct(AnimalInterface $animal)
	{
		$this->animal = $animal;
	}
	
	public function run()
	{
		return $this->animal->run();
	}
}
 
 
$dog = new Animal(new Dog());
echo $dog->run();