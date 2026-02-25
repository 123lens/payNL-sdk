<?php

define('PROJECT_ROOT', '');

require_once PROJECT_ROOT . '/vendor/autoload.php';
require_once PROJECT_ROOT . '/config.php';

$transactionId = $_REQUEST['pay_order_id'] ?? '1234567890X12345';

$slcode = $_REQUEST['slcode'] ?? '';
if ($slcode) {
    \Paynl\Config::setServiceId($slcode);
}

$password = $_REQUEST['password'] ?? false;
if ($password) {
    \Paynl\Config::setApiToken($password);
}


try {
    /** @var \Paynl\Result\Transaction\Transaction $transaction */
    $transaction = \Paynl\Transaction::get($transactionId);

    echo '<pre>';
    print_r($transaction->getData());
    echo '</pre>';

} catch (Exception $exception) {
    echo 'Could not retrieve transaction: ' . $exception->getMessage();
}