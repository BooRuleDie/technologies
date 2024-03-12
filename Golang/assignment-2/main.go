package main

import (
	"fmt"
	"io"
	"os"
)

func main() {
	last_arg := os.Args[len(os.Args)-1]
	file, err := os.Open(last_arg)
	if err != nil {
		fmt.Println("Error:", err)
		os.Exit(1)
	}

	io.Copy(os.Stdout, file)

	
}
