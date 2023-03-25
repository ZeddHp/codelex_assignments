<?php

$board = array(
    array(' ', ' ', ' '),
    array(' ', ' ', ' '),
    array(' ', ' ', ' ')
);


$player = 'X';

$gameOver = false;

$winner = null;

$tie = false;

$turn = 1;


while (!$gameOver) {

    //Display the board.
    echo "Turn: $turn" . PHP_EOL;
    echo " {$board[0][0]} | {$board[0][1]} | {$board[0][2]} " . PHP_EOL;
    echo "-----------" . PHP_EOL;
    echo " {$board[1][0]} | {$board[1][1]} | {$board[1][2]} " . PHP_EOL;
    echo "-----------" . PHP_EOL;
    echo " {$board[2][0]} | {$board[2][1]} | {$board[2][2]} " . PHP_EOL;

    //Prompt the player to enter a row and column.
    echo "Player $player, enter a row (0, 1, or 2) and a column (0, 1, or 2): ";
    $row = trim(fgets(STDIN));
    $column = trim(fgets(STDIN));

    //Check if the row and column are valid.
    if ($row < 0 || $row > 2 || $column < 0 || $column > 2) {
        echo "Invalid row or column." . PHP_EOL;
        continue;
    }

    //Check if the cell is empty.
    if ($board[$row][$column] != ' ') {
        echo "Cell is not empty." . PHP_EOL;
        continue;
    }

    //Place the player's mark on the board.
    $board[$row][$column] = $player;

    //Check if the player has won.
    if (hasWon($board, $player)) {
        $gameOver = true;
        $winner = $player;
        break;
    }

    //Check if the game is a tie.
    if (isTie($board)) {
        $gameOver = true;
        $tie = true;
        break;
    }

    //Change the player.
    if ($player == 'X') {
        $player = 'O';
    } else {
        $player = 'X';
    }

    $turn++;
}

//Check if the player has won.
function hasWon($board, $player)
{
    //Check rows.
    for ($i = 0; $i < 3; $i++) {
        if ($board[$i][0] == $player && $board[$i][1] == $player && $board[$i][2] == $player) {
            return true;
        }
    }

    //Check columns.
    for ($j = 0; $j < 3; $j++) {
        if ($board[0][$j] == $player && $board[1][$j] == $player && $board[2][$j] == $player) {
            return true;
        }
    }

    //Check diagonals.
    if ($board[0][0] == $player && $board[1][1] == $player && $board[2][2] == $player) {
        return true;
    }
    if ($board[0][2] == $player && $board[1][1] == $player && $board[2][0] == $player) {
        return true;
    }

    return false;
}

function isTie($board)
{
    //Check if the game is a tie.
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            if ($board[$i][$j] == ' ') {
                return false;
            }
        }
    }
    return true;
}

//Display the result.
if ($winner != null) {
    echo "Player $winner won." . PHP_EOL;
} else if ($tie) {
    echo "The game is a tie." . PHP_EOL;
}





