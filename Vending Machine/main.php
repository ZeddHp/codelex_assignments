<?php
$MIN_BET_AMOUNT = 1;
$MAX_BET_AMOUNT = 1000;

function generateBoard($board, $symbols): array
{
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 4; $j++) {
            $slots = array_values($symbols);
            $symbol = $slots[rand(0, sizeof($slots) - 1)];
            $board[$i][$j] = $symbol->name;
        }
    }
    return $board;
}

require "Symbol.php";

global $MIN_BET_AMOUNT;
global $MAX_BET_AMOUNT;

$credits = 10000;

$board = [
    ["#", "#", "#", "#"],
    ["#", "#", "#", "#"],
    ["#", "#", "#", "#"],
];

$symbols = [
    "A" => $ace = new Symbol("A", 10),
    "K" => $king = new Symbol("K", 5),
    "Q" => $queen = new Symbol("Q", 3),
    "J" => $jack = new Symbol("J", 2),
    "10" => $ten = new Symbol("10", 1)
];

while ($credits > 0) {

    $board = generateBoard($board, $symbols);

    $winningLines = [
        array($board[0][0], $board[0][1], $board[0][2], $board[0][3]),
        array($board[1][0], $board[1][1], $board[1][2], $board[1][3]),
        array($board[2][0], $board[2][1], $board[2][2], $board[2][3]),
        array($board[0][0], $board[1][0], $board[2][0], $board[0][0]),
        array($board[0][1], $board[1][1], $board[2][1], $board[0][1]),
        array($board[0][2], $board[1][2], $board[2][2], $board[0][2]),
        array($board[0][3], $board[1][3], $board[2][3], $board[0][3]),
        array($board[0][0], $board[1][1], $board[2][2], $board[2][3]),
        array($board[0][3], $board[1][2], $board[2][1], $board[2][0])
    ];


    echo "You have $credits credits." . PHP_EOL;
    $betAmount = readline("Enter your bet: [From $MIN_BET_AMOUNT to $MAX_BET_AMOUNT] ");

    if (!is_numeric($betAmount) || ($betAmount < $MIN_BET_AMOUNT || $betAmount > $MAX_BET_AMOUNT)) {
        echo "Invalid input, try again" . PHP_EOL;
        continue;
    }

    foreach ($board as $row) {
        $formattedRow = [];
        foreach ($row as $slot) {
            strlen($slot) > 1 ? $formattedRow[] = $slot : $formattedRow[] = $slot . " ";
        }
        echo join(" -  ", $formattedRow) . PHP_EOL;
    }

    $result = 0;
    $winningLinesCount = 0;
    foreach ($winningLines as $line) {
        if (count(array_unique($line)) === 1) {
            $symbol = $symbols[$line[0]];
            $result += $symbol->points * (int)$betAmount;
            $winningLinesCount++;
        }
    }

    if (!$winningLinesCount == 0) {
        $credits += $result;
        echo "You won $result credits" . PHP_EOL;
        echo "There were $winningLinesCount winning lines." . PHP_EOL;
        continue;
    }

    echo "No winning lines" . PHP_EOL;
    $credits -= (int)$betAmount;
}




