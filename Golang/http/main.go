package main

import (
	"fmt"
	"io"
	"net/http"
	"os"
)

func main() {
	resp, err := http.Get("https://google.com")
	if err != nil {
		fmt.Println("Error:", err)
	}

	// bs := make([]byte, 99999)
	// n, err := resp.Body.Read(bs)
	// if err != nil && err != io.EOF {
	// 	fmt.Println("Error:", err)
	// }

	// fmt.Println(n) // 18982
	// fmt.Println(string(bs))

	io.Copy(os.Stdout, resp.Body)
}
