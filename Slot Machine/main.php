<?php
session_start();
require 'elements.php';
require 'symbol.php';
require 'functions.php';
require "config.php";
require "error_messages.php";

//Credit/bet values
global $bet_amount;
global $MIN_BET_AMOUNT;
global $MAX_BET_AMOUNT;
global $MIN_CREDIT_AMOUNT;
global $MAX_CREDIT_AMOUNT;

//Error messages
global $BET_AMOUNT_ERROR;
global $BET_AMOUNT_ERROR2;
global $CREDIT_AMOUNT_ERROR;
global $CREDIT_AMOUNT_ERROR2;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body id="ik1r">

<div class="gjs-row" id="id0s">
    <div class="gjs-cell" id="iu8i">

        <h1 style="text-align: center">Slot Machine</h1>
    </div>
</div>
<?php

// IDK if this works
// it checks only after spin button is pressed and credit is already decreased
if (isset($_POST['spin'])) {
    //reset error message
    $_SESSION['temp_error'] = '';
    if ($bet_amount > $_SESSION['credit']) {
        $_SESSION['temp_error'] = $CREDIT_AMOUNT_ERROR;
    }
}

// Set initial bet amount
if (!$bet_amount) {
    $bet_amount = $MIN_BET_AMOUNT;
};

// set initial credit
if (!isset($_SESSION['credit'])) $_SESSION['credit'] = 100;

// Decrease credit on spin
if (isset($_POST['spin'])) {
    $_SESSION['credit'] -= $_SESSION['BET_AMOUNT'];
    if ($_SESSION['credit'] <= $MIN_CREDIT_AMOUNT) {
        $_SESSION['temp_error'] = $CREDIT_AMOUNT_ERROR;
        $_SESSION['credit'] = $MIN_CREDIT_AMOUNT;
    }
    if ($_SESSION['BET_AMOUNT'] > $bet_amount) {
        $bet_amount = $_SESSION['BET_AMOUNT'];
    }
}

//Increase bet amount
if (isset($_POST['plus'])) {
    $_SESSION['BET_AMOUNT'] += $MIN_BET_AMOUNT;
    if ($_SESSION['BET_AMOUNT'] >= $MAX_BET_AMOUNT) {
        $_SESSION['temp_error'] = $BET_AMOUNT_ERROR2;
        $_SESSION['BET_AMOUNT'] = $MAX_BET_AMOUNT;
    }
    //Decrease bet amount
} elseif (isset($_POST['minus'])) {
    if ($_SESSION['BET_AMOUNT'] <= $MIN_BET_AMOUNT) {
        $_SESSION['temp_error'] = $BET_AMOUNT_ERROR;
        $_SESSION['BET_AMOUNT'] = $MIN_BET_AMOUNT;
    } else {
        $_SESSION['BET_AMOUNT'] -= $MIN_BET_AMOUNT;
    }
} else {
    $_SESSION['BET_AMOUNT'] = $bet_amount;
}

$board = array(
    array('#', '#', '#', '#'),
    array('#', '#', '#', '#'),
    array('#', '#', '#', '#'));

$Ace = new Symbol('A', 5);
$King = new Symbol('K', 4);
$Queen = new Symbol('Q', 3);
$Jack = new Symbol('J', 2);
$Ten = new Symbol('10', 1);

$slot = array($Ace, $King, $Queen, $Jack, $Ten);

for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 4; $j++) {
        $board[$i][$j] = $slot[rand(0, 4)]->image($slot[rand(0, 4)]->name);
    }
}

// TODO: winning positions pārvēst par funckiju
$winningPositions = array(
    array($board[0][0], $board[0][1], $board[0][2], $board[0][3]),
    array($board[1][0], $board[1][1], $board[1][2], $board[1][3]),
    array($board[2][0], $board[2][1], $board[2][2], $board[2][3]),
    array($board[0][0], $board[1][0], $board[2][0], $board[0][0]),
    array($board[0][1], $board[1][1], $board[2][1], $board[0][1]),
    array($board[0][2], $board[1][2], $board[2][2], $board[0][2]),
    array($board[0][3], $board[1][3], $board[2][3], $board[0][3]),
    array($board[0][0], $board[1][1], $board[2][2], $board[0][0]),
    array($board[0][3], $board[1][2], $board[2][1], $board[0][3]),);


$winningLines = 0;
for ($i = 0; $i < count($winningPositions); $i++) {
    $winningPositions[$i] = array_unique($winningPositions[$i]);
    if (count($winningPositions[$i]) == 1) {
        $winningLines++;
    }
}

function printWinnings()
{
    global $winningLines, $bet_amount, $points;
    echo "Winning lines: " . $winningLines . "</br>";
    echo "You won. " . $bet_amount * $points * $winningLines . " credits!";
}

if (isset($_POST['spin'])) {
    for ($i = 0; $i < count($winningPositions); $i++) {
        if (count($winningPositions[$i]) == 1) {

            if ($winningPositions[$i][0] == $Ace->image($Ace->name)) {
                $points = $Ace->points;
            } elseif ($winningPositions[$i][0] == $King->image($King->name)) {
                $points = $King->points;
            } elseif ($winningPositions[$i][0] == $Queen->image($Queen->name)) {
                $points = $Queen->points;
            } elseif ($winningPositions[$i][0] == $Jack->image($Jack->name)) {
                $points = $Jack->points;
            } elseif ($winningPositions[$i][0] == $Ten->image($Ten->name)) {
                $points = $Ten->points;
            }
            /*//print winning element points
            echo $points;
            //print winning element symbol
            echo $winningPositions[$i][0];*/
        }
    }
    if ($winningLines > 0) {
        $_SESSION['credit'] += $bet_amount * $points * $winningLines;
    }
}

?>

<!--// row 1-->
<div class="gjs-row" id="im9g">
    <div class="gjs-cell" id="ibji">
        <?php echo " {$board[0][0]}"; ?>
    </div>
    <div class="gjs-cell" id="irm1">
        <?php echo " {$board[0][1]}"; ?>
    </div>
    <div class="gjs-cell" id="irj9">
        <?php echo " {$board[0][2]}"; ?>
    </div>
    <div class="gjs-cell" id="ixsz">
        <?php echo " {$board[0][3]}"; ?>
    </div>
</div>

<!--// row 2-->
<div class="gjs-row" id="ijxzo">
    <div class="gjs-cell" id="i7hdm">
        <?php echo " {$board[1][0]}"; ?>
    </div>
    <div class="gjs-cell" id="ic3zp">
        <?php echo " {$board[1][1]}"; ?>
    </div>
    <div class="gjs-cell" id="i7apn">
        <?php echo " {$board[1][2]}"; ?>
    </div>
    <div class="gjs-cell" id="isfnm">
        <?php echo " {$board[1][3]}"; ?>
    </div>
</div>

<!--// row 3-->
<div class="gjs-row" id="i8oxk">
    <div class="gjs-cell" id="ia6s">
        <?php echo " {$board[2][0]}"; ?>
    </div>
    <div class="gjs-cell" id="i3k8r">
        <?php echo " {$board[2][1]}"; ?>
    </div>
    <div class="gjs-cell" id="invg5">
        <?php echo " {$board[2][2]}"; ?>
    </div>
    <div class="gjs-cell" id="iwhdj">
        <?php echo " {$board[2][3]}"; ?>
    </div>
</div>


<div class="gjs-row" id="i4mj3">

    <!--Credit and Bet-->
    <div class="gjs-cell" id="ivuq4">
        <div class="gjs-cell" id="ia6s">
            <?php
            echo "[i] - for info</br>"; //TODO: add info
            echo "CREDIT: " . ($_SESSION['credit']) . "</br>";
            echo "BET: " . ($_SESSION['BET_AMOUNT']) . "</br>";
            ?>
        </div>
    </div>

    <!--Buttons-->
    <div class="gjs-cell" id="ivuq4">
        <div class="gjs-cell" id="iwhdj">
            <form method="post">
                <!--disable spin button if credit is less than bet amount-->
                <!-- fuj -->
                <button type="submit" name="spin" value="spin">
                    <?php if ($_SESSION['credit'] < ($_SESSION['BET_AMOUNT']) ? spinDisabled() : spin()) ?>
                </button>

                <button type="submit" name="minus" value="minus">
                    <?php minus(); ?>
                </button>

                <button type="submit" name="plus" value="plus">
                    <?php plus(); ?>
                </button>

                <!--varbūt šādi? lai simboli uz laukuma nepārlādētos-->
                <!--<button type="button" name="plus" value="plus"
                        onclick="<?php /*$_SESSION['BET_AMOUNT'] += $MIN_BET_AMOUNT */ ?>">
                    <?php /*plus(); */ ?>
                </button>-->
            </form>
        </div>
    </div>
</div>
<div style="text-align:center">
    <?php
    printWinnings(); ?>
    <h6>
        <?php
        //Display error message
        if (!empty($_SESSION['temp_error']))
            displayError($_SESSION['temp_error']);
        ?>
    </h6>
</div>
</body>
</html>










