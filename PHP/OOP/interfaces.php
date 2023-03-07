<?php 
    // Interfaces are quite similar to abstract classes however there are a few differences between them.
    # 1. Interfaces can only have abstract methods whereas you can define properties and normal methods in abstract classes
    # 2. All methods in the interface must be public
    # 3. Classe can implement an interface while inheriting from another class

    // interface for all animals
    interface Animal {
        public function makeSound(); // you don't need to specify abstract keyword in interfaces
    }

    // Cat class
    class Cat implements Animal {
        public function makeSound() {
            echo "Woaf Woaf!<br>";
        }
    }

    // Dog class
    class Dog implements Animal {
        public function makeSound() {
            echo "Meow Meow!<br>";
        }
    }

    // Monkey class
    class Monkey implements Animal {
        public function makeSound() {
            echo "Huhuhahahahah!<br>";
        }
    }

    // Creating Cat, Dog, Monkey object and calling makeSound method
    $cat1 = new Cat();
    $dog1 = new Dog();
    $monkey1 = new Monkey();

    $array = array($cat1, $dog1, $monkey1);

    foreach ($array as $object) {
        $object -> makeSound();
    }
?>