<?php

namespace ex_8;

class SavingsAccount
{
    private $annualInterestRate;
    private $balance;

    public function __construct($balance)
    {
        $this->annualInterestRate = 0;
        $this->balance = $balance;
    }

    public function setAnnualInterestRate($rate)
    {
        $this->annualInterestRate = $rate;
    }

    public function addDeposit($amount)
    {
        $this->balance += $amount;
    }

    public function subtractWithdrawal($amount)
    {
        $this->balance -= $amount;
    }

    public function addMonthlyInterest()
    {
        $monthlyInterestRate = $this->annualInterestRate / 12;
        $monthlyInterest = $monthlyInterestRate * $this->balance;
        $this->balance += $monthlyInterest;
    }

    public function getBalance()
    {
        return $this->balance;
    }
}

// Usage example
echo "How much money is in the account?: ";
$startingBalance = floatval(fgets(STDIN));

echo "Enter the annual interest rate: ";
$annualInterestRate = floatval(fgets(STDIN));

echo "How long has the account been opened? ";
$numMonths = intval(fgets(STDIN));

$savingsAccount = new SavingsAccount($startingBalance);
$savingsAccount->setAnnualInterestRate($annualInterestRate);

$totalDeposits = 0;
$totalWithdrawals = 0;
$totalInterestEarned = 0;

for ($i = 1; $i <= $numMonths; $i++) {
    echo "Enter amount deposited for month $i: ";
    $deposit = floatval(fgets(STDIN));
    $savingsAccount->addDeposit($deposit);
    $totalDeposits += $deposit;

    echo "Enter amount withdrawn for month $i: ";
    $withdrawal = floatval(fgets(STDIN));
    $savingsAccount->subtractWithdrawal($withdrawal);
    $totalWithdrawals += $withdrawal;

    $savingsAccount->addMonthlyInterest();
    $totalInterestEarned += ($savingsAccount->getBalance() - $startingBalance);
}

$endingBalance = $savingsAccount->getBalance();
$totalDepositsFormatted = number_format($totalDeposits, 2);
$totalWithdrawalsFormatted = number_format($totalWithdrawals, 2);
$totalInterestEarnedFormatted = number_format($totalInterestEarned, 2);
$endingBalanceFormatted = number_format($endingBalance, 2);

echo "Total deposited: $$totalDepositsFormatted\n";
echo "Total withdrawn: $$totalWithdrawalsFormatted\n";
echo "Interest earned: $$totalInterestEarnedFormatted\n";
echo "Ending balance: $$endingBalanceFormatted\n";
