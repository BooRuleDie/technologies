package main

import "fmt"

func main() {
	// almost same way to declare a map
	// var colors map[string]string
	// colors := make(map[string]string)

	colors := map[string]string{
		"red":   "#ff0000",
		"green": "#00ff00",
		"blue":  "#0000ff",
	}

	colors["orange"] = "ffa500"
	fmt.Println(colors)

	delete(colors, "green")
	fmt.Println(colors)

	printMap(colors)
}

func printMap(m map[string]string) {
	for color, hex := range m {
		fmt.Println("hex value of", color, "is", hex)
	}
}
