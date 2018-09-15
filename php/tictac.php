<?php
class TicTacToe
{
    static $board = array();
    static $xturn = 1;
    public function initialize()
    {
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                TicTacToe::$board[$i][$j] = ' ';
            }
        }
        echo "for you to start press 1 for computer to start press 2 \n";
        include "utility.php";
        $sta = new Utility();
        $chek = $sta->getInt();
        if ($chek == 2) {
            TicTacToe::$xturn = 0;
        }

    }
    public function play()
    {
        $game = 1;
        while ($game) {
            TicTacToe::displayboard();
            TicTacToe::displaymenu();

            if (TicTacToe::getMove()) {
                TicTacToe::displayboard();
                if (TicTacToe::$xturn) {
                    echo "You win \n";
                } else {
                    echo "Computer won \n";
                }

                $game = 0;
                break;
            } elseif (TicTacToe::boardFull()) {
                TicTacToe::displayboard();
                echo "draw";
                $game = 0;
                break;
            } else {
                TicTacToe::$xturn = !(TicTacToe::$xturn);
            }

        }
    }
    public function displayboard()
    {
        echo "*******\n";
        TicTacToe::displayrow(0);
        echo "*******\n";
        TicTacToe::displayrow(1);
        echo "*******\n";
        TicTacToe::displayrow(2);
        echo "*******\n";
    }
    public function displayrow($row)
    {
        echo "|" . TicTacToe::$board[$row][0] . "|" . TicTacToe::$board[$row][1] .
        "|" . TicTacToe::$board[$row][2] . "|";
        echo "\n";
    }

    public function displaymenu()
    {
        if (TicTacToe::$xturn) {
            echo "Your Turn \n";

        } else {
            echo "Computer turn \n";
        }
    }

    public function getMove()
    {
        $invalid = 1;
        $row = 0;
        $col = 0;
        while ($invalid) {
            if (TicTacToe::$xturn) {
                echo "Enter the row \n";
                fscanf(STDIN, '%d', $row);
                echo "Enter the col \n";
                fscanf(STDIN, '%d', $col);

                if ($row >= 0 && $row <= 2 && $col >= 0 && $col <= 2) {
                    if (TicTacToe::$board[$row][$col] !== ' ') {
                        echo "That position is already taken";
                    } else {
                        $invalid = 0;
                    }
                } else {
                    echo "Invalid position";
                }
            } else {
                $row = rand(0, 2);
                $col = rand(0, 2);
                if ($row >= 0 && $row <= 2 && $col >= 0 && $col <= 2) {
                    if (TicTacToe::$board[$row][$col] == ' ') {
                        $invalid = 0;
                    }
                }
            }

        }
        if (TicTacToe::$xturn) {
            TicTacToe::$board[$row][$col] = 'X';
        } else {
            TicTacToe::$board[$row][$col] = 'O';
        }
        return TicTacToe::winner($row, $col);
    }

    public function winner($lastrow, $lastcol)
    {
        $win = 0;
        $symbol = TicTacToe::$board[$lastrow][$lastcol];
       

        if (TicTacToe::$board[0][0] == $symbol &&
            TicTacToe::$board[1][1] == $symbol &&
            TicTacToe::$board[2][2] == $symbol) {
            $win = 1;
        }
        if (TicTacToe::$board[0][2] == $symbol &&
            TicTacToe::$board[1][1] == $symbol &&
            TicTacToe::$board[2][0] == $symbol) {
            $win = 1;
        }
        if (TicTacToe::$board[0][0] == $symbol &&
            TicTacToe::$board[0][1] == $symbol &&
            TicTacToe::$board[0][2] == $symbol) {
            $win = 1;
        }
        if (TicTacToe::$board[1][0] == $symbol &&
            TicTacToe::$board[1][1] == $symbol &&
            TicTacToe::$board[1][2] == $symbol) {
            $win = 1;
        }
        if (TicTacToe::$board[2][0] == $symbol &&
            TicTacToe::$board[2][1] == $symbol &&
            TicTacToe::$board[2][2] == $symbol) {
            $win = 1;
        }
        if (TicTacToe::$board[0][0] == $symbol &&
            TicTacToe::$board[1][0] == $symbol &&
            TicTacToe::$board[2][0] == $symbol) {
            $win = 1;
        }
        if (TicTacToe::$board[0][1] == $symbol &&
            TicTacToe::$board[1][1] == $symbol &&
            TicTacToe::$board[2][1] == $symbol) {
            $win = 1;
        }
        if (TicTacToe::$board[0][2] == $symbol &&
            TicTacToe::$board[1][2] == $symbol &&
            TicTacToe::$board[2][2] == $symbol) {
            $win = 1;
        }
        return $win;
    }
    public function boardFull()
    {
        $filled = 0;
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if (TicTacToe::$board[$i][$j] == 'X' || TicTacToe::$board[$i][$j] == 'O') {
                    $filled++;
                }
            }
        }
        if ($filled == 9) {
            return 1;
        } else {
            return 0;
        }

    }
}
