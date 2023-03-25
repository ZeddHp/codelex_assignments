<?php

$file_path = 'Hangman_wordbank.csv';

// Array to store the words
$words = array();

// Open the CSV file
if (($handle = fopen($file_path, "r")) !== FALSE) {
    // Loop through each row of the CSV file
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        // Loop through each column of the row
        foreach ($data as $column) {
            // Split the column into an array of words
            $column_words = explode(' ', $column);
            // Add each word to the words array
            foreach ($column_words as $word) {
                // Check if the word is not empty
                if (strlen($word) > 0) {
                    $words[] = $word;
                }
            }
        }
    }
    // Close the CSV file
    fclose($handle);
}





//var_dump($words);
