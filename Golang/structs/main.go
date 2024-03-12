package main

import "fmt"

type contactInfo struct {
	email   string
	zipCode int
}

type person struct {
	firstName string
	lastName  string
	// contact   contactInfo -> instead of using this syntax you can just use the name of the struct just like that
	contactInfo
}

func main() {
	// var empty person

	eren := person{
		firstName: "Eren",
		lastName:  "Burulday",
		contactInfo: contactInfo{
			email:   "eren.burulday@mail.com",
			zipCode: 43000,
		},
	}
 
	eren.updateFirstName("Jeager")
	eren.print() // didn't change :/

	// personPointer := &eren
	// personPointer.reallyUpdateFirstName("Jeager")
	// actually you don't need to explicitly define the pointer just like the code above
	// you can use this code below and rest of the operations will be handled by the Go
	eren.reallyUpdateFirstName("Jeager")
	eren.print()

}

// it didn't change the original data becuase struct is a value type data type
// when you pass a struct to a function Golang creates a copy of the data and use that data
// as structs don't store reference of data but the actual data when you modify the p in the function below
// you didn't modify the original data but the copy of it
// if you'd like to change the original data then you need to use pointers in structs
func (p person) updateFirstName(newFirstName string) {
	p.firstName = newFirstName
}

func (pointerToPerson *person) reallyUpdateFirstName(newFirstName string) {
	(*pointerToPerson).firstName = newFirstName
}

func (p person) print() {
	// + means print the field names as well
	fmt.Printf("%+v \n", p)
}
