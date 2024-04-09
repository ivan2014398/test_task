<?php

class Animal {
    private $registrationNumber;

    public function __construct($registrationNumber) {
        $this -> registrationNumber = $registrationNumber;
    }
}

class Cow extends Animal {
    public function produceMilk() {
        return rand(8, 12);
    }
}

class Chicken extends Animal {
    public function layEgg() {
        return rand(0, 1);
    }
}

class Farm {
    private $animals = [];

    public function addAnimal(Animal $animal) {
        $this -> animals[] = $animal;
    }

    public function collectProduce() {
        $totalMilk = 0;
        $totalEggs = 0;

        foreach($this->animals as $animal) {
            if($animal instanceof Cow) {
                $totalMilk += $animal->produceMilk();
            } elseif($animal instanceof Chicken) {
                $totalEggs += $animal -> layEgg();
            }
        }
        return ["milk" => $totalMilk, "eggs" => $totalEggs];
    }

    public function getAnimalsCount() {
        $cowCount= 0;
        $chickenCount = 0;

        foreach($this->animals as $animal) {
            if($animal instanceof Cow) {
                $cowCount ++;
            } else if($animal instanceof Chicken) {
                $chickenCount ++;
            }
        }
        return ["Cows" => $cowCount, "Chickens" => $chickenCount];
    }
}

$farm = new Farm();
for($i = 1; $i <= 10; $i ++) {
    $cow = new Cow('cow_'.$i);
    $farm->addAnimal($cow);
}

for($i = 1; $i <= 20; $i ++) {
    $chicken = new Chicken('chicken_'.$i);
    $farm -> addAnimal($chicken);
}

$animalsCount = $farm->getAnimalsCount();
echo "Коровы: " . $animalsCount['Cows'] . ", Куры: " . $animalsCount['Chickens'] . "\n";

$produce = $farm->collectProduce();
echo "Собрано за неделю: Молоко - " . $produce['milk'] . " литров, Яйца - " . $produce['eggs'] . " штук\n";
 


?>
