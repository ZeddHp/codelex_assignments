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
<body>

<?php
require "functions.php";
$computerChoice = null;
$playerChoice = null;
if (isset($_POST['button_scissors'])) {
    $computerChoice = rand(1, 3);
    $playerChoice = 1;
} else if (isset($_POST['button_rock'])) {
    $computerChoice = rand(1, 3);
    $playerChoice = 2;
} else if (isset($_POST['button_paper'])) {
    $computerChoice = rand(1, 3);
    $playerChoice = 3;
}
?>


<div class="container">
    <div class="box">
        <h1>Computer chose:</h1>
        <?php
        if ($computerChoice == 1) {
            displayScissors();
        } else if ($computerChoice == 2) {
            displayRock();
        } else if ($computerChoice == 3) {
            displayPaper();
        }
        ?>
    </div>
    <div class="box">
        <h1>Your choice:</h1>
        <?php
        if ($playerChoice == 1) {
            displayScissors();
        } else if ($playerChoice == 2) {
            displayRock();
        } else if ($playerChoice == 3) {
            displayPaper();
        }
        ?>
    </div>
</div>

<div class="container">
    <form method="post">
        <div class="box">
            <button type="submit" name="button_scissors" value="">
                <?php
                displayScissors();
                ?>
            </button>
            <button type="submit" name="button_rock" value="">
                <?php
                displayRock();
                ?>
            </button>
            <button type="submit" name="button_paper" value="">
                <?php
                displayPaper();
                ?>
            </button>
        </div>
    </form>
</div>

<div class="container">
    <?php
    if ($computerChoice == $playerChoice) {
        echo "It's a tie!";
    } else if ($computerChoice == 1 && $playerChoice == 2) {
        echo "You win!";
    } else if ($computerChoice == 1 && $playerChoice == 3) {
        echo "You lose!";
    } else if ($computerChoice == 2 && $playerChoice == 1) {
        echo "You lose!";
    } else if ($computerChoice == 2 && $playerChoice == 3) {
        echo "You win!";
    } else if ($computerChoice == 3 && $playerChoice == 1) {
        echo "You win!";
    } else if ($computerChoice == 3 && $playerChoice == 2) {
        echo "You lose!";
    }
    ?>
</div>

</body>
</html>