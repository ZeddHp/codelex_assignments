<?php


require "../vendor/autoload.php";

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

$city = readline("Enter city: ");
$key = 'd48224702d82ffe0e7d083e668ce8c79';
$url = 'https://api.openweathermap.org/data/2.5/weather?q=' . $city . '&lang=en&units=metric&appid=' . $key;

$client = new Client(['verify' => false]);
try {
    $response = $client->request('GET', $url);
} catch (GuzzleException $e) {
    echo $e . PHP_EOL;
}


$body = $response->getBody();
$weather = json_decode($body);

$temperature = $weather->main->temp;
$maxTemperature = $weather->main->temp_max;
$wind = $weather->wind->speed;
$feelsLike = $weather->main->feels_like;
$description = $weather->weather[0]->description;

echo "Temperature: $temperature" . PHP_EOL;
echo "Max temperature: $maxTemperature" . PHP_EOL;
echo "Wind: $wind" . PHP_EOL;
echo "Feels like: $feelsLike" . PHP_EOL;
echo "Description: $description" . PHP_EOL;
