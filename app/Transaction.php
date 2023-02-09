<?php

namespace App;

class Transaction
{
    public function __construct()
    {
    }

    public function getTransactionFiles(string $dirPath): array
    {
        $files = [];
        foreach (scandir($dirPath) as $file) {
            if(is_dir($file)) {
                continue;
            }
            $files[] = $dirPath.$file;
        }
        return  $files;
    }

    function getTransactions(string $fileName): array
    {
        if(!file_exists($fileName)) {
            trigger_error("file " . $fileName . "does not exists", E_USER_ERROR);
        }
        $file = fopen($fileName, "r");
        $transactions = [];
        fgetcsv($file);
        while(($transaction = fgetcsv($file)) !== false) {
            $transactions[] = $this->extractTransaction($transaction);
        }
        return $transactions;
    }

    function extractTransaction(array $transactionRow): array
    {
        [$date, $checkNumber, $description, $amount] = $transactionRow;
        $amount = (float)str_replace(['$', ','], '', $amount);
        return  [
            'date' => $date,
            'checkNumber' => $checkNumber,
            'description' => $description,
            'amount' => $amount,
        ] ;
    }

    function calculateTotals(array $transactions): array
    {
        $totals = ["netTotal" => 0, "totalIncome" => 0, "totalExpense" => 0];

        foreach ($transactions as $transaction) {
            $totals["netTotal"] += $transaction['amount'];
            if($transaction['amount'] <= 0) {
                $totals["totalExpense"] += $transaction['amount'];
            } else {
                $totals["totalIncome"] += $transaction["amount"];
            }
        }

        return $totals;
    }
}