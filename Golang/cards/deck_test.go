package main

import (
	"os"
	"testing"
)

func TestNewDeck(t *testing.T) {
	deck := newDeck()

	if len(deck) != 16 {
		t.Errorf("expected deck length 16 but got %v", len(deck))
	}

	if deck[0] != "Ace of Spades" {
		t.Errorf("expected first card to be 'Ace of Spades' but got %v", deck[0])
	}

	if deck[len(deck)-1] != "Four of Diamonds" {
		t.Errorf("expected first card to be 'Four of Diamonds' but got %v", deck[len(deck)-1])
	}
}

func TestWriteToFileAndNewDeckFromFile(t *testing.T) {
	tempFilename := "_tempdeckfile"
	os.Remove(tempFilename)

	deck := newDeck()
	deck.writeToFile(tempFilename)

	deckFromFile := deck.newDeckFromFile(tempFilename)

	if len(deckFromFile) != 16 {
		t.Errorf("expected deck length 16 but got %v", len(deckFromFile))
	}

	os.Remove(tempFilename)
}
