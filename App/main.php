<?php

require '../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

$regCode = readline("Enter registration number: ");
$key = "25e80bf3-f107-4ab4-89ef-251b5b9374e9";
$url = 'https://data.gov.lv/dati/lv/api/3/action/datastore_search?q=' . $regCode . '&resource_id=' . $key;

$client = new Client([
    'base_uri' => $url
]);

try {
    $response = $client->request('GET');
    $data = json_decode($response->getBody(), true);
    $records = $data['result']['records'];

    foreach ($records as $record) {
        if ($record['regcode'] == $regCode) {
            foreach ($record as $key => $value) {
                echo $key . ": " . $value . "\n";
            }
            break;
        }
    }

} catch (RequestException $e) {
    echo "Error: " . $e->getMessage();
}
