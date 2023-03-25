<?php

require 'words.php';
global $words;
$word = $words[array_rand($words)];

function displaySeparator(int $wordLength): void
{
    $times = (18 + $wordLength) > 26 ? 18 + $wordLength + 3 : 29;
    echo str_repeat('=', $times) . PHP_EOL;
}

function guessLetter(string $word, int $wordLength): void
{
    $wrongGuesses = 0;
    $spaceLen = 18 + $wordLength - 26;

    $guessedWord = array_fill(0, $wordLength, "_");
    echo "Word to guess contains $wordLength letters: " . implode($guessedWord) . PHP_EOL;
    displaySeparator($wordLength);

    while ($wrongGuesses < 3) {
        $letter = readline("Guess a letter: ");
        $correctGuess = false;
        for ($i = 0; $i < $wordLength; $i++) {
            if ($letter == $word[$i]) {
                $guessedWord[$i] = $letter;
                displaySeparator($wordLength);
                echo "|| Your guess was correct!" . str_repeat(" ", ($wordLength > 8 ? ((18 + $wordLength) - 26 + 1) : 1)) . "||" . PHP_EOL;
                echo "|| Word to guess: " . implode($guessedWord) . str_repeat(" ", ($spaceLen >= 1) ? 1 : (27 - (18 + $wordLength))) . "||" . PHP_EOL;
                displaySeparator($wordLength);
                $correctGuess = true;
            }
        }

        if (!$correctGuess) {
            $wrongGuesses++;
            displaySeparator($wordLength);
            echo "|| Your guess was wrong!" . str_repeat(" ", ($wordLength > 8 ? ((18 + $wordLength) - 24 + 1) : 1)) . "||" . PHP_EOL;
            echo "|| Word to guess: " . implode($guessedWord) . str_repeat(" ", ($spaceLen >= 1) ? 1 : (27 - (18 + $wordLength))) . "||" . PHP_EOL;
            displaySeparator($wordLength);
            echo "Wrong guess. You have " . (3 - $wrongGuesses) . " guesses left." . PHP_EOL;
        }

        if ($guessedWord == str_split($word)) {
            echo "You guessed the word!" . PHP_EOL;
            break;
        }

        echo PHP_EOL;
    }
}

$wordLength = strlen($word);

echo $word . PHP_EOL;
guessLetter($word, $wordLength);