package main

import "fmt"

func main() {
	
	// variable definition format: 
	// <var keyword> <name of the variable> <data type> = <value of the variable>
	var name string = "hulolo2"
	
	// you can also declare a variable and assign a value to it later on
	var age int 
	age = 32 // assigned a value

	var isMarried bool = false

	// defining multiple variables in the same line 
	var name1, name2 string = "username", "password"
	
	// defining variables in a python-like manner
	var1 := 32
	string1 := "string1"
	boolean1 := true

	fmt.Println("hulolo", name, age, isMarried)
	fmt.Println(name1, name2)
	fmt.Println(var1, string1, boolean1)
}
