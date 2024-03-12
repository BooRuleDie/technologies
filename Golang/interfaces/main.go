package main

import "fmt"

type englishBot struct{}
type russianBot struct{}

// meaning any type that has a receiver function getGreeting which returns a string is also a type of bot
type bot interface {
	getGreeting() string
}

func main() {
	eb := englishBot{}
	rb := russianBot{}

	printGreeting(eb)
	printGreeting(rb)
}

func printGreeting(b bot) {
	fmt.Println(b.getGreeting())
}

func (eb englishBot) getGreeting() string {
	// custom logic here
	return "Hello!"
}
func (rb russianBot) getGreeting() string {
	// custom logic here
	return "Привет!"
}
