<?php
class Person {
    //public $name;
    private $name;
    private $lastname;
    private $age;
    private $hp;
    private $mother;
    private $father;


    function_construct($name,$lastname,$age, $mother=null , $father=null) {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->age = $age;
        $this->mother = $mother;
        $this->father = $father;
        $this->hp = 100; //здоровье изначально 100%
    }
    function sayHi($name) {
        return "Hi $name, I'm " .$this->name;
    }
    function setHp($hp) {
        if ($this->hp + $hp>=100) $this->hp = 100; //здоровье человека не может быть больше 100
        esle  $this->hp = $this->hp+$hp;
    }
    function getHp() {
        return $this->hp;
    }
    function getName() {
        return $this->name;
    }
    function getMother() {
        return $this->mother;
    }
    function getFather() {
        return $this->father;
    }
    function getInfo() {
        return "<h3>A few words about myself:</h3>"."My name is: ".$this->getName()."<br> my lastname is: ".$this->getLastname()."<br> my father is: ".$this->getFather()->getName();
    }
}

$petr = new Person("Petr","Ivanov",72);
$olimpiada = new Person("Olimpiada","Ivanova",70);
$igor = new Person("Igor","Petrov",68);
$maria = new Person("Maria", "Petrova",66);

$alex = new Person("Alex","Ivanov",42, $olimpiada, $petr);
$olga = new Person("Olga","Ivanova",42, $maria, $igor);
$valera = new Person("Valera","Ivanov",15, $olga, $alex);

echo $valera->getName() . "<br>";
//echo $valera->mother->getName(); Так работать не будет, только через геттер
echo $valera->getMother()->getName() . "<br>"; //Получаем маму Валеры
echo $valera->getFather()->getName() . "<br>"; //получаем папу Валеры
echo $valera->getMother()->getFather()->getName();//Получаем дедушку Валеры
echo $valera->getMother()->getMother()->getName();
echo $valera->getFather()->getMother()->getName();
echo $valera->getFather()->getFather()->getName();


// $igor = new Person("Igor", "Petrov", 38);
// echo $alex->sayHi($igor->name);
// $alex->name = "Alex";
// echo $alex->name;

$medkit = 50; //аптечка
//echo $alex->hp."<br>"; //выводим самочувствие алекса на экран
//$alex->hp = $alex->hp-30; //алекс упал и его здоровье уменьшилось на 30
$alex->setHp(-30);
echo $alex->getHp() ."<br>";
//$alex->hp = $alex->hp+$medKit; //алекс нашел аптечку, и его здоровье увеличилось
$alex->setHp($medKit);
echo $alex->getHp();

?>