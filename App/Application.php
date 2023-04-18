<?php
require_once '../vendor/autoload.php';

require "ApiClient.php";
require "Data.php";

$query = readline('Enter registration number: ');

$apiClient = new ApiClient();
$records = $apiClient->getRecords($query);

echo PHP_EOL;

if (!$records) {
    echo 'Results not found.';
}

foreach ($records as $record) {
    echo "Company name: {$record->getName()}" . PHP_EOL;
    echo "Registration number: {$record->getRegNumber()}" . PHP_EOL;
    echo "Address: {$record->getAddress()}" . PHP_EOL;
    $date = substr($record->getRegDate(), 0, 10);
    echo "Registration date: $date" . PHP_EOL;
    echo PHP_EOL;
}