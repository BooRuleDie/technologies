package main

import "fmt"

func main() {
	// all ways to define a variable
	var name string = "hulolo"
	var name1 = "hulolo"
	name2 := "hulolo"

	fmt.Println(name, name1, name2)

	// var var1 string = "hey"
	// var var2 int = "hulo"
	// var var3 float32 = "hele"

	// instead of defining variables as it's shown above you can use following syntax:
	var (
		var1 string  = "hey"
		var2 int     = 12
		var3 float32 = 12.1
	)

	// or you can use even a tidier syntax like that
	var var4, var5, var6 = "hey", 12, 12.1

	// and this is the last way of doing same thing, I think you can guess which syntax I'm going to use
	var7, var8, var9 := "hey", 12, 21.1

	fmt.Println(var1, var2, var3)
	fmt.Println(var4, var5, var6)
	fmt.Println(var7, var8, var9)

	// when you declare a variable in Go, a Zero Value for that variable is assigned automatically
	// string -> ""
	// int -> 0
	// float32 -> 0
	// bool -> false
	// . . . they can be considered as default values, Zero Value is a just fancy way to say it
}
