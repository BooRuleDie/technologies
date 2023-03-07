<?php 
    namespace FruitPlate;
    // Namespaces are used to enhance the organisation among PHP classes
    // Also thanks to Namespaces you can give the same name to more than one class, just be sure that they belong to different namespaces
    // Namespaces must be written at the first line of the script.

    class Fruit {
        private static $name = "Apple"; // default name for fruit
        private static $color = "Red"; // default name for color

        public function __construct($name, $color){
            $this -> name = $name;
            $this -> color = $color;
        }

        // When you're accessing properties of a class from a static class be sure that both of them are static and use the self::<name of property> syntax to get no error.
        public static function whatAmI(){
            echo "I'm an " . self::$name . " and my color is " . self::$color;
        }
    }

    Fruit::whatAmI();
?>

<?php 
namespace aNewNamespace;

class Fruit {
    // we get no error as you can see
}
?>

<?php 
// You can give aliases to namespaces if you'd like to
use aNewNamespace as anns;

?>