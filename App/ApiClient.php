<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ApiClient
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Returns an array of Data objects matching the provided registration code.
     *
     * @param string $registrationCode The registration code to search for.
     * @return array An array of Data objects.
     * @throws GuzzleException|JsonException If the API request fails or returns unexpected data.
     */
    public function getRecords(string $registrationCode): array
    {
        $key = "&resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9";
        $query = "q=$registrationCode";
        $url = "https://data.gov.lv/dati/lv/api/3/action/datastore_search?q=" . $query . $key;

        try {
            $response = $this->client->request('GET', $url);
        } catch (GuzzleException $e) {
            throw GuzzleException("Error retrieving data from the API: " . $e->getMessage(), $e->getCode(), $e);
        }

        $responseData = json_decode($response->getBody()->getContents());

        if (!isset($responseData->result->records)) {
            throw new JsonException("Unexpected API response data: " . json_encode($responseData));
        }

        $foundRecords = [];
        foreach ($responseData->result->records as $record) {
            if ($record->regcode === $registrationCode) {
                $foundRecords[] = new Data(
                    $record->name,
                    $record->regcode,
                    $record->address,
                    $record->registered
                );
            }
        }

        return $foundRecords;
    }
}
