<?php

require_once '/src/public/vendor/autoload.php';
require_once '/src/public/config.php';

$slcode = $_REQUEST['slcode'] ?? '';
if ($slcode) {
    \Paynl\Config::setServiceId($slcode);
}

$password = $_REQUEST['password'] ?? false;
if ($password) {
    \Paynl\Config::setApiToken($password);
}


try {
    $paymentMethods = \Paynl\Paymentmethods::getList();
    echo '<pre>';
    print_r($paymentMethods);
    echo '</pre>';
} catch (\Paynl\Error\Error $e) {
    echo "ERROR: " . $e->getMessage();
}
