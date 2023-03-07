<?php 
// Iterable is any value that can be loop through with a foreach() loop
// You can create an iterable by implementing iterable interface, there are 5 abstract methods that you need to implement:
    # 1. current() -> returns the element that the pointer is currently pointing to.
    # 2. key() -> returns the key of current element
    # 3. next() -> moves pointer to the next elemenet
    # 4. rewind() -> moves pointer to the first element
    # 5. valid() -> It's used to check if the end of the iterable is reached. It returns false if you use this method when the pointer is at the last element otherwise it return true.

    // Creating Custom Iterator Class
    class anIterator implements Iterator {
        private $elements = [];
        private $pointer = 0;

        public function __construct($elements) {
            // array_values ensures that keys are numbers
            $this -> elements = array_values($elements);
        }

        public function current() {
            return $this -> elements[ $this -> pointer ];
        }

        public function key() {
            return $this -> pointer;
        }

        public function next() : void { // you need to specify return type for next
            if (!$this -> valid()) {
                throw new Exception("Out of limit.");
            } else {
                $this -> pointer ++;
            }
        }

        public function rewind() : void { // you need to specify return type for rewind
            $this -> pointer = 0;
        }  

        public function valid() : bool { // you need to specify return type for valid
            return $this -> pointer < count($this -> elements);
        }
    }

    $myCustomIterator = new anIterator(["h", "u", "l","o","l","o"]);

    foreach ($myCustomIterator as $item) {
        echo "$item<br>";
    }
?>