<?php

class Car {
  // Properties
  public $make;
  public $model;
  public $year;
  
  // Constructor
  public function __construct($make, $model, $year) {
    $this->make = $make;
    $this->model = $model;
    $this->year = $year;
  }
  
  // Methods
  public function getMake() {
    return $this->make;
  }
  
  public function setMake($make) {
    $this->make = $make;
  }
  
  public function getModel() {
    return $this->model;
  }
  
  public function setModel($model) {
    $this->model = $model;
  }
  
  public function getYear() {
    return $this->year;
  }
  
  public function setYear($year) {
    $this->year = $year;
  }
  
  public function displayInfo() {
    echo "Make: " . $this->make . "<br>";
    echo "Model: " . $this->model . "<br>";
    echo "Year: " . $this->year . "<br>";
  }
}

// Create an instance of the Car class
$car1 = new Car("Toyota", "Corolla", 2019);

// Call methods to get and set properties
echo "Before:<br>";
echo $car1->getMake() . "<br>";
echo $car1->getModel() . "<br>";
echo $car1-> getYear() . "<br>";

$car1->setMake("Honda");
$car1->setModel("Civic");
$car1->setYear(2020);

echo "<br>After:<br>";
echo $car1->getMake() . "<br>";
echo $car1->getModel() . "<br>";
echo $car1->getYear() . "<br>";

// Call a method to display the car info
echo "<br>Car Info:<br>";
$car1->displayInfo();

?>
