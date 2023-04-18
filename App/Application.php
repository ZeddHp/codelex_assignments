<?php
require_once '../vendor/autoload.php';

require "ApiClient.php";
require "Data.php";

class Application {
    private $apiClient;

    public function __construct(ApiClient $apiClient) {
        $this->apiClient = $apiClient;
    }

    public function run() {
        $query = readline('Enter registration number: ');

        // Validate user input
        if (!$this->validateInput($query)) {
            echo 'Invalid input. Please enter a valid registration number.' . PHP_EOL;
            return;
        }

        $records = $this->apiClient->getRecords($query);

        // Handle no results
        if (!$records) {
            echo 'Results not found.' . PHP_EOL;
            return;
        }

        $this->displayRecords($records);
    }

    private function validateInput(string $input): bool {
        // TODO: Implement validation logic
        return true;
    }

    private function displayRecords(array $records) {
        // TODO: Implement formatting logic
        foreach ($records as $record) {
            echo "Company name: {$record->getName()}" . PHP_EOL;
            echo "Registration number: {$record->getRegNumber()}" . PHP_EOL;
            echo "Address: {$record->getAddress()}" . PHP_EOL;
            $date = substr($record->getRegDate(), 0, 10);
            echo "Registration date: $date" . PHP_EOL;
            echo PHP_EOL;
        }
    }
}

$apiClient = new ApiClient();
$app = new Application($apiClient);
$app->run();
