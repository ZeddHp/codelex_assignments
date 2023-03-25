<?php


function showRules()
{
    echo "|------------------------|\n";
    echo "|   Move     |   Beats   |\n";
    echo "|------------------------|\n";
    echo "|   Rock     |  Lizard   |\n";
    echo "|   Rock     |  Scissors |\n";
    echo "|   Paper    |   Rock    |\n";
    echo "|   Paper    |   Spock   |\n";
    echo "|  Scissors  |  Lizard   |\n";
    echo "|  Scissors  |   Paper   |\n";
    echo "|   Lizard   |   Paper   |\n";
    echo "|   Lizard   |   Spock   |\n";
    echo "|   Spock    |  Scissors |\n";
    echo "|   Spock    |   Rock    |\n";
    echo "|------------------------|\n";
    menu();
}

// logic
function startGame()
{
    $possible_moves = array('rock', 'paper', 'scissors', 'lizard', 'spock');
    // user input
    echo "Possible moves: " . implode(', ', $possible_moves) . PHP_EOL;

    $user_move = readline("Enter your move:  ");

    // computer move
    $computer_move = $possible_moves[array_rand($possible_moves)];

    // validation
    while (!in_array(strtolower($user_move), $possible_moves)) { // TODO: add in_array validation in previous assignments
        $user_move = readline("Invalid move. Please enter again: ");
    }

    if ($user_move == $computer_move) {
        echo "It's a tie!\n";
    } else if (
        //Rock > lizard
        //Rock > scissors
        ($user_move == 'rock' && in_array($computer_move, array('scissors', 'lizard'))) ||

        //Paper > rock
        //Paper > Spock
        ($user_move == 'paper' && in_array($computer_move, array('rock', 'spock'))) ||

        //Scissors > lizard
        //Scissors > paper
        ($user_move == 'scissors' && in_array($computer_move, array('paper', 'lizard'))) ||

        //Lizard > paper
        //Lizard > Spock
        ($user_move == 'lizard' && in_array($computer_move, array('paper', 'spock'))) ||

        //Spock > scissors
        //Spock > rock
        ($user_move == 'spock' && in_array($computer_move, array('rock', 'scissors')))
    ) {
        echo "You win! Your $user_move beats computer's $computer_move.\n";
    } else {
        echo "Computer wins! Computer's $computer_move beats your $user_move.\n";
    }
    menu();
}

function menu()
{
    echo "\n1. Play\n";
    echo "2. Show rules\n";
    echo "3. Exit\n";
    $choice = readline("Enter your choice: ");
    switch ($choice) {
        case 1:
            startGame();
            break;
        case 2:
            showRules();
            break;
        case 3:
            exit;
        default:
            echo "Invalid choice. Please enter again.\n";
            menu();
            break;
    }
}

menu();

