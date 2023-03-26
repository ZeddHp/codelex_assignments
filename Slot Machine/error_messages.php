<?php
require "config.php";
global $MIN_BET_AMOUNT;
global $MAX_BET_AMOUNT;
global $MIN_CREDIT_AMOUNT;
global $MAX_CREDIT_AMOUNT;


//Error messages
$BET_AMOUNT_ERROR = 'Bet amount cant be below ' . $MIN_BET_AMOUNT;
$BET_AMOUNT_ERROR2 = 'Bet amount cant be above ' . $MAX_BET_AMOUNT;

$CREDIT_AMOUNT_ERROR = 'You have low credit ' . $MIN_CREDIT_AMOUNT;
$CREDIT_AMOUNT_ERROR2 = 'You have reached limit ' . $MAX_CREDIT_AMOUNT;

$BET_CREDIT_ERROR = 'Spin cost is higher than your credit';