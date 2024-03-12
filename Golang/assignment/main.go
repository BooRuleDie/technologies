package main

import (
	"fmt"
)

type square struct {
	sideLength float64
}

type triangle struct {
	height float64
	base   float64
}

type shape interface {
	getArea() float64
}

func main() {
	t := triangle{height: 10, base: 5}
	s := square{sideLength: 10}

	printArea(s)
	printArea(t)
}

func (s square) getArea() float64 {
	return s.sideLength * s.sideLength
}

func (t triangle) getArea() float64 {
	return (t.base * t.height) / 2
}

func printArea(s shape) {
	fmt.Println(s.getArea())
}
