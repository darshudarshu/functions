package main

import (
	"fmt"
	"functionals/golang/utility"
)

func main() {
	var input string
	fmt.Println("enter  the string or numbers")
	fmt.Scanf("%s", &input)
	fmt.Println("possible  strings are")
	utility.Permatation([]rune(input), 0)
}
