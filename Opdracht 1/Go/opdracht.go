package main

import (
	"fmt"
)

func main() {
	counter := 10
	words := true
	i := 0
	for i < counter {
		if words == true {
        		fmt.Println("Hallo Kruitbosch!")
			words = false
    		} else {
        		fmt.Println("Doei Kruitbosch!")
			words = true
    		}
		i++
	}
}