package main

import (
	"fmt"
	"functionals/golang/utility"
)

func main() {
	for {
		var num int
		fmt.Println("enter 0 for int array")
		fmt.Println("enter 1 for double array")
		fmt.Println("enter 2 for string array")
		fmt.Scanf("%d", &num)

		switch num {
		case 0:
			utility.Integer()
		case 1:
			utility.Double()
		case 2:
			utility.Stringar()
		default:
			fmt.Println("number is invalid no")
		}
		if num == 0 || num == 1 || num == 2 {
			break
		}
	}
}
