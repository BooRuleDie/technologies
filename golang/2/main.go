// package clause
// it's the package that is going to be used to run the code, you must name it main
// or you'd get such an error: package command-line-arguments is not a main package
package main

// imports 'fmt' package
import "fmt"

// name of the function in the main package must be 'main', otherwise you'd get such an error:
// # command-line-arguments
// runtime.main_main·f: function main is undeclared in the main package
func main() {
	fmt.Println("Hello World v2!")
}

// go run main.go -> runs the main function inside the main package
// go build main.go -> creates a binary for the main function in the main package