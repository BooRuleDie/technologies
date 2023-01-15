package main

import "fmt"

// package scope
var packageVar = "packageVar"

// can't type short variable declaration
// pack1 := "hulo" ❌ 

func main() {
	
	// function scope
	var var1 = "you can access me as long as you're inside the main function"
	
	var name = "hulo"
	
	// you can't do that however
	// name := "hulo new" ❌

	// you can do that because when you use it in this syntax it performs assignment for the first variable and defining for the second one.
	name, surname := "hulo new", "surname"
	
	fmt.Println(var1, name, surname)
}