package main

import (
	"fmt"
	"net/http"
	"time"
)

func main() {
	links := []string{
		"http://google.com",
		"http://facebook.com",
		"http://example.com",
		"http://tiktok.com",
		"http://youtube.com",
	}

	c := make(chan string)

	for _, link := range links {
		go checkStatus(link, c)
	}

	for link := range c {
		// it's important to pass the link into the function literal as some problems may occur if the literal function go routine tries to access a variable that's mainted by another routine (main routine in this case)
		go func(link string) {
			time.Sleep(time.Second * 3)
			checkStatus(link, c)
		}(link)
	}

}

func checkStatus(link string, c chan string) {
	_, err := http.Get(link)
	if err != nil {
		fmt.Println("site might be down")
	} else {
		fmt.Println(link, "is up")
	}

	c <- link
}
