<?php
session_start();
require 'elements.php';
require 'symbol.php';
require 'functions.php';
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
        <h6>
            <?php
            $temp_error = '';
            displayError($temp_error);
            ?>
        </h6>
        <h1>Slot Machine</h1>
    </div>
</div>
<?php

//Minimum bet amount
$MIN_BET_AMOUNT = 0.25;

//Maximum bet amount
$MAX_BET_AMOUNT = 10;

//Error messages
$BET_AMOUNT_ERROR = 'Bet amount cant be below' . $MIN_BET_AMOUNT;
$BET_AMOUNT_ERROR2 = 'Bet amount cant be above' . $MAX_BET_AMOUNT;

$bet_amount = $MIN_BET_AMOUNT;

//Increase bet amount
if (isset($_POST['plus'])) {
    $_SESSION['bet_amount'] += $MIN_BET_AMOUNT;
    if ($_SESSION['bet_amount'] >= $MAX_BET_AMOUNT) {
        $temp_error = $BET_AMOUNT_ERROR2;
        $_SESSION['bet_amount'] = $MAX_BET_AMOUNT;
    }
    //Decrease bet amount
} elseif (isset($_POST['minus'])) {
    if ($_SESSION['bet_amount'] <= $MIN_BET_AMOUNT) {
        $temp_error = $BET_AMOUNT_ERROR;
        $_SESSION['bet_amount'] = $MIN_BET_AMOUNT;
    } else {
        $_SESSION['bet_amount'] -= $MIN_BET_AMOUNT;
    }
} else {
    $_SESSION['bet_amount'] = $bet_amount;
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
    <div class="gjs-cell" id="ivuq4">
        <div class="gjs-cell" id="ia6s">
            <?php
            echo "[i] - for info</br>"; //TODO: add info
            echo "CREDIT: " . "0000" . "</br>"; //TODO: add credit
            echo "BET: " . ($_SESSION['bet_amount']) . "</br>"; //TODO: add bet
            ?>
        </div>
    </div>
    <div class="gjs-cell" id="ivuq4">
        <div class="gjs-cell" id="iwhdj">
            <form method="post">
                <button type="submit" name="spin" value="spin">
                    <?php spin(); ?>
                </button>
                <button type="submit" name="minus" value="minus">
                    <?php minus(); ?>
                </button>
                <button type="submit" name="plus" value="plus">
                    <?php plus(); ?>
                </button>
            </form>
        </div>
    </div>
</div>

</body>
</html>






