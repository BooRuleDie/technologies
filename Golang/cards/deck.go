package main

import (
	"fmt"
	"math/rand"
	"os"
	"strings"
	"time"
)

// deck type is the same as a string slice
type deck []string

// create a brand new deck
// we won't need any receiver here because there is no deck yet to use this function on :)
func newDeck() deck {
	deckSuites := []string{"Spades", "Hearts", "Clubs", "Diamonds"}
	deckValues := []string{"Ace", "Two", "Three", "Four"}

	cards := deck{}
	for _, suite := range deckSuites {
		for _, value := range deckValues {
			cards = append(cards, value+" of "+suite)
		}
	}

	return cards
}

// Receiver Function for deck type
func (d deck) print() {
	for index, card := range d {
		fmt.Println(index, card)
	}
}

// deal function to demonstrate slicing the slice :)
func deal(d deck, handSize int) (deck, deck) {
	// d[<included>:<excluded>]
	return d[:handSize], d[handSize:]
}

// classical toString function
func (d deck) toString() string {
	// type conversion []string(d)
	// but if we used d directly it'd work either as it's a string slice as well
	return strings.Join([]string(d), ", ")
}

// write contents to a file
func (d deck) writeToFile(filename string) error {
	return os.WriteFile(filename, []byte(d.toString()), 0666)
}

// read from the filesystem and create a deck
func (d deck) newDeckFromFile(filename string) deck {
	sb, error := os.ReadFile(filename)
	if error != nil {
		// Option 1 -> log the error and return a default cards value
		// Option 2 -> log the error and exit the program
		fmt.Println("Error: ", error)
	}

	return deck(strings.Split(string(sb), ", "))
}

// shuffle the deck
func (d deck) shuffle() {
	// seed logic
	un := time.Now().UnixNano()
	ns := rand.NewSource(un)
	r := rand.New(ns)

	// appearenlty we don't need to implement seed logic for the code below, just added to go along with the video
	for i := range d {
		ri := r.Intn(len(d))
		d[i], d[ri] = d[ri], d[i]
	}

}
