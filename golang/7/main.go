package main

import "fmt"

func main() {
	var x, y = 10, 11.1

	fmt.Printf("%v: %T\n", x, x)
	fmt.Printf("%v: %T\n", y, y)

	// fmt.Println(x + y) -> returns missmatched type error because one of the value is int other one is float32
	// what we need to do is type conversion, the syntax is quite similar to python
	fmt.Println(x + int(y))

	// even though data types quite similar it still wants them to be exactly same data type
	var var1 int8 = 1 
	var var2 uint8 = 2

	// fmt.Println(var1 + var2) ❌ -> missmatched type error
	fmt.Println(var1 + int8(var2))
}
