<?php

require_once "../vendor/autoload.php";

require "ApiClient.php";
require "Coin.php";

$client = new ApiClient();
$coins = $client->getData();

foreach ($coins as $coin){
    $coin->showInfo();
}
