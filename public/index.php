<?php

declare(strict_types=1);

require_once __DIR__ . "/../vendor/autoload.php";

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

$transaction = new \App\Transaction();
$helper = new App\Helpers\Helpers();

$files = $transaction->getTransactionFiles(FILES_PATH);

$transactions = [];

foreach ($files as $file) {
    $transactions = array_merge_recursive($transactions, $transaction->getTransactions($file));
}

$totals = $transaction->calculateTotals($transactions);

require_once VIEWS_PATH . "transactionsView.php";