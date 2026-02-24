<?php

define('PROJECT_ROOT', '');

require_once PROJECT_ROOT . '/vendor/autoload.php';
require_once PROJECT_ROOT . '/config.php';

$transactionId = $_GET['pay_order_id'] ?? null;
$amount = $_GET['amount'] ?? null;
$tracktrace = $_GET['tracktrace'] ?? null;

$articleId = '1';
$quantityToBeCaptured = '1';
$products[$articleId] = $quantityToBeCaptured;

try {
    $result = \Paynl\Transaction::capture($transactionId, $amount, $tracktrace, $products);
} catch (\Paynl\Error\Error $e) {
    echo $e->getMessage();
}
