package main

import "fmt"

func assignment() {
	ints := []int{}
	for value := range 10 {
		ints = append(ints, value)
	}

	for _, value := range ints {
		if value%2 == 0 {
			fmt.Printf("%d is even\n", value)
		} else {
			fmt.Printf("%d is odd\n", value)
		}
	}
}
