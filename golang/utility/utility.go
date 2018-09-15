package utility

import (
	"fmt"
	"math"
)

// function to find the distance between (0,0) and (x,y)
func Distance() {

	fmt.Println("enter x position")
	var x int
	fmt.Scanf("%d", &x)

	fmt.Println("enter y position")
	var y int
	fmt.Scanf("%d", &y)

	distance := math.Pow((float64(x)*float64(x) + float64(y)*float64(y)), 0.5)
	println("the distance is")
	println(distance)

}

//function to find string permatation (combination)
func Permatation(strarray []rune, i int) {
	if i == len(strarray) {
		fmt.Println(string(strarray))
	} else {
		for j := i; j < len(strarray); j++ {
			strarray[i], strarray[j] = strarray[j], strarray[i]
			Permatation(strarray, i+1)
			strarray[i], strarray[j] = strarray[j], strarray[i]
		}
	}
}

//to find the qudratic roots
func Quadratic() {
	var a, b, c float64
	fmt.Println("enter the value of a")

	fmt.Scanf("%f ", &a)
	fmt.Println("enter the value of b")

	fmt.Scanf("%f ", &b)
	fmt.Println("enter the value of c")

	fmt.Scanf("%f ", &c)

	var delta float64

	delta = b*b - 4*a*c
	if delta > 0 {
		fmt.Println("the roots are real and different ")
		root1 := (-b + math.Sqrt(delta)) / (2 * a)
		root2 := (-b - math.Sqrt(delta)) / (2 * a)
		fmt.Printf(" root 1 is %f\n", root1)
		fmt.Printf(" root 2 is %f\n", root2)
	} else if delta == 0 {
		fmt.Println("the roots are real and equal ")
		root1 := (-b + math.Sqrt(delta)) / (2 * a)
		root2 := (-b - math.Sqrt(delta)) / (2 * a)
		fmt.Printf(" root 1 is %f\n", root1)
		fmt.Printf(" root 2 is %f\n", root2)
	} else {
		fmt.Println("the roots are imaginary")
		delta = delta * -1
		roota := delta / (2 * a)
		rootb := delta / (2 * a)
		root1 := (math.Sqrt(delta)) / (2 * a)
		root2 := (math.Sqrt(delta)) / (2 * a)
		fmt.Printf(" root 1 is %f + %fi\n", roota, root1)
		fmt.Printf(" root 2 is -%f + %fi\n", rootb, root2)
	}
}

// function to find the triplet sum of zero
func SumZero() {
	fmt.Println("enter the array size")
	var size int
	fmt.Scanf("%d", &size)
	a := make([]int, size)
	fmt.Println("enter the array elements")
	for j := 0; j < len(a); j++ {

		fmt.Scanf("%d", &a[j])
	}
	var present int = 0
	for i := 0; i < len(a)-2; i++ {
		for j := i + 1; j < len(a)-1; j++ {
			for k := j + 1; k < len(a); k++ {
				if a[i]+a[j]+a[k] == 0 {
					fmt.Println("sumzero elements are")
					fmt.Printf("[%d] [%d] [%d] \n", a[i], a[j], a[k])
					present = 1
				}
			}

		}
	}
	if present == 0 {
		fmt.Println("no such element present")
	}
}

// 2d array
func Integer() {
	// to store int array
	fmt.Println("enter main array size")
	var m int
	fmt.Scanf("%d", &m)
	a := make([][]int, m)
	for i := range a {
		fmt.Printf("enter innner %d array size \n", i)
		var n int
		fmt.Scanf("%d", &n)
		a[i] = make([]int, n)
	}
	for i := 0; i < len(a); i++ {
		fmt.Printf("enter the %d th array elements \n", i)
		for j := 0; j < len(a[i]); j++ {

			fmt.Scanf("%d", &a[i][j])
		}
	}
	fmt.Printf("entered the array elements \n")
	for i := 0; i < len(a); i++ {
		for j := 0; j < len(a[i]); j++ {
			fmt.Printf("%d ", a[i][j])

		}
		fmt.Println(" \n")
	}
}

// to store double value array
func Double() {

	fmt.Println("enter main array size")
	var m int
	fmt.Scanf("%d", &m)
	a := make([][]float64, m)
	for i := range a {
		fmt.Printf("enter innner %d array size \n", i)
		var n int
		fmt.Scanf("%d", &n)
		a[i] = make([]float64, n)
	}
	for i := 0; i < len(a); i++ {
		fmt.Printf("enter the %d th array elements \n", i)
		for j := 0; j < len(a[i]); j++ {

			fmt.Scanf("%f", &a[i][j])
		}
	}
	fmt.Printf("entered the array elements \n")
	for i := 0; i < len(a); i++ {
		for j := 0; j < len(a[i]); j++ {
			fmt.Printf("%f ", a[i][j])

		}
		fmt.Println(" \n")
	}
}

//to store string array
func Stringar() {

	fmt.Println("enter main array size")
	var m int
	fmt.Scanf("%d", &m)
	a := make([][]string, m)
	for i := range a {
		fmt.Printf("enter inner %d array size \n", i)
		var n int
		fmt.Scanf("%d", &n)
		a[i] = make([]string, n)
	}
	for i := 0; i < len(a); i++ {
		fmt.Printf("enter the %d th array elements \n", i)
		for j := 0; j < len(a[i]); j++ {

			fmt.Scanf("%s", &a[i][j])
		}
	}
	fmt.Printf("entered the array elements \n")
	for i := 0; i < len(a); i++ {
		for j := 0; j < len(a[i]); j++ {
			fmt.Printf("%s ", a[i][j])

		}
		fmt.Println(" \n")
	}
}

//to calculate wind
func WindChill() {

	var t, v float64
	fmt.Println("enter temp ")
	fmt.Scanf("%f", &t)
	fmt.Println("enter speed ")
	fmt.Scanf("%f", &v)
	if (v < 120 && v > 3) && t < 50 {
		wind := 35.74 + 0.6215*t + (0.4275*t-35.75)*math.Pow(v, 0.16)
		fmt.Printf("windchill = %f \n", wind)
	} else {
		fmt.Println("in valid input ")
		fmt.Println("enter speed range 3<v<120")
		fmt.Println("enter temp t<50 ")
		WindChill()
	}
}
