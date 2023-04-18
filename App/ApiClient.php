<?php


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ApiClient
{
    private Client $client;
    public function __construct()
    {
        $this->client = new Client(['verify' => false ]);
    }

    public function getRecords(string $parameter): array
    {
        $key = "&resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9";
        $query = "q=$parameter";
        $url = "https://data.gov.lv/dati/lv/api/3/action/datastore_search?q=" . $query . $key;

        try {
            $response = $this->client->request('GET', $url);
        } catch (GuzzleException $e) {
            echo $e . PHP_EOL;
        }

        $companyData = json_decode($response->getBody()->getContents());

        $foundedRecords = [];
        foreach ($companyData->result->records as $record) {
            if ($record->regcode === $parameter)
                $foundedRecords[] = new Data(
                    $record->name,
                    $record->regcode,
                    $record->address,
                    $record->registered
                );

        }
        return $foundedRecords;
    }
}