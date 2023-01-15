package main

import "fmt"

func main() {
	// even though you don't specify the types, golang understand the type automatically
	var name = "stringValue"
	// but it doesn't do type conversion like this one-> name = 2
	var var1 = 1
	var var2 = true
	var var3 = 1.3

	fmt.Println(name, var1, var2, var3)
	// in order to get the data types of variables, we can use %T format specifier with fmt.Printf()
	// and also %v can be used to print out value of variable
	fmt.Printf("%T %v\n", name, name)
	fmt.Printf("%T %v\n", var1, var1)
	fmt.Printf("%T %v\n", var2, var2)
	fmt.Printf("%T %v\n", var3, var3)
}

