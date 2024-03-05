package main




func main() {
	cards := newDeck()

	// firstHand, secondHand := deal(cards, 4)
	
	// thanks to receiver function in deck.go
	// firstHand.print()
	// secondHand.print()

	// fmt.Println(cards.toString())
	// cards.writeToFile("cards.txt")

	new_card := cards.newDeckFromFile("cards.txt")
	new_card.print()

}

