<?php
class Utility
{
     // function for validating integer
    public function getInt()
    {
        $num = readline();
        if (filter_var($num, FILTER_VALIDATE_INT) && (preg_match('/[0-9]/', $num))) {
            return $num;
        } else {
            echo "enter valid number  \n";
            return $this->getInt();
        }
    }
    // function to replace username with given name 
    public function replaceUsername()
    {
        $bool = false;
        do {

            $name = readline("enter the User Name : \n");
            if (strlen($name) <= 3 || (preg_match('/[0-9]/', $name))) {
                echo "invalid User Name  \n";
                $bool = true;
            } else {
                echo "Hello " . $name . ", How are you  \n";
                $bool = false;
            }
        } while ($bool);
    }
    // function to calculate the %tage of tail and heads in nth trails
    public function flipCoin()
    {

        echo "enter no of times the coin to be flipped : \n";
        $times = $this->getInt();
        $times1 = $times;
        $tail = 0;
        $head = 0;
        while ($times > 0) {
            if ((rand(0, 1) / 2) < 0.5) {
                $tail++;
            } else {
                $head++;
            }
            $times--;
        }
        echo " Tails Percentage =" . ($tail / $times1) * 100 . "\n";
        echo " Heads Percentage =" . ($head / $times1) * 100 . "\n";
    }
    //function to check given year is leapyear or not
    public function leapYear()
    {
        $bool = false;
        do {
            echo "Enter the year : \n";
            $year = Utility::getInt();
            if (strlen($year) == 4) {
                if ($year % 400 == 0) {
                    echo $year . " is a leap year \n";
                } else {
                    echo $year . " is not a leap year \n";
                }
                $bool = false;
            } else {
                echo "enter 4 digit integer input \n";
                $bool = true;
            }
        } while ($bool);
    }
    //print the table of 2^n till powernumber
    public function powerOfTwo()
    {
        echo "Enter the +ve integer Number : \n";
        $powerNumber = Utility::getInt();
        $ref = 0;
        while ($ref <= $powerNumber) {
            echo "2 power " . $ref . " =" . pow(2, $ref);
            $ref++;
            echo "\n";
        }

    }
    //function to find the hormonic
    public function hormonic()
    {
        echo "Enter the nth number : \n";
        $number = Utility::getInt();
        $nthHormonic = 0;
        $ref = $number;
        while ($number > 0) {
            $nthHormonic = $nthHormonic + 1 / $number;
            $number--;
        }
        echo " nthHormonic of " . $ref . " =" . $nthHormonic . "\n";
    }
    // function to find  primefactors
    public function primeFactor()
    {
        echo "Enter the +ve integer Number : \n";
        $number = Utility::getInt();
        if($number>=0){
        echo "prime factors are \n";
        while ($number % 2 == 0) {
            $number = $number / 2;
            echo "2 \n";
        }
        for ($i = 3; $i <= $number; $i = $i + 2) {
            while (($number % $i) == 0) {
                echo $i . "\n";
                $number = $number / $i;
            }
        }}
        else {
            echo "invalid number \n";
            utility::primeFactor();
        }
    }
    //function to find %tage of loosing and winning in a game
    public function gambler()
    {
        echo "Enter the stake , goal , no of times : \n";
        $stake = Utility::getInt();
        $goal = Utility::getInt();
        $noTimes = Utility::getInt();
        $win = 0;
        $loose =0;
        for ($i = 0; $i < $noTimes; $i++) {
            $invest = $stake;
            while ($invest > 0 && $invest < $goal) {

                if (rand(0, 1) == 0) {
                    $invest++;
                } else {
                    $invest--;
                }

            }
            if ($invest == $goal) {
                $win++;
            }
            if ($invest == 0) {
                $loose++;
            }
        }
        echo "no of wins =" . $win . " of " . $noTimes . "\n";
        echo "no of wins =" . $loose . " of " . $noTimes . "\n";
        echo "percentage of win =" . ($win / $noTimes) * 100 . "\n";
        echo "percentage of win =" . ($loose / $noTimes) * 100 . "\n";
    }
    // function trails needed to get distinct no of coupons
    public function coupon()
    {
        echo "Enter the number of coupon = ";
        $number = $this->getInt();
        $demoary = array();
        $noOfCoupons = 0;
        $distinct = count($demoary);
        while ($distinct < $number) {
            $random = (rand(1, $number));
            $noOfCoupons++;
            $demoary = Utility::isPresent($demoary, $random);
            $distinct = count($demoary);
        }
        echo "tarils needed = " . $noOfCoupons . "\n";
    }
    //  to check the number is present or not in array for di
    public function isPresent($demoary, $random)
    {
        $check = 0;
        for ($i = 0; $i < count($demoary); $i++) {
            if ($demoary[$i] == $random) {
                $check = 1;
                break;
            }
        }
        if ($check == 0) {
            $demoary[count($demoary)] = $random;
        }
        return $demoary;
    }
    //functions to operate stopwatch
    public function stopWatch()
    {
        $check = 3;
        echo "enter 1 to start \n";
        $start=Utility::getInt();
        switch ($start) {
            case 1:$timestart = microtime(true);
            do {
                echo "enter 2 to stop 3 to reset \n";
                $temp = Utility::getInt();
                switch ($temp) {
                    case 3:$temp = 3;
                    $timestart = microtime(true);
                        break;
                    case 2:$temp = 2;
    
                        break;
                    default:
                        echo "ivalid no \n";
                        $temp = 3;
                        break;
                }
            } while ($check == $temp);
            $timestop = microtime(true);
            $exectime = $timestop - $timestart ;
            echo "start time " . $timestop . "seconds \n";
            echo "stop time " . $timestart . "seconds \n";
            echo "time spent=" . $exectime . "seconds \n";
                
                break;
            
            default:
                 echo "enter valid no \n";
                 utility::stopWatch();
                break;
        }
        
    }
    
}
