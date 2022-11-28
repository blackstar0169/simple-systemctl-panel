<?php

use App\Lib\Response;
use App\Lib\Nonce;
use Dotenv\Dotenv;

// Load env
$dotenv = Dotenv::createImmutable(BASEDIR);
$dotenv->load();

// Register classes
$app = app();
$app->singleton('nonce', Nonce::class);

// Dispatch controller
$controller_class = 'index';
$method = 'index';
if (!empty($_GET['p'])) {
    $controller_class = $_GET['p'];
    $method = 'index';

    if (!empty($_GET['action'])) {
        $method = $_GET['action'];
    }
}

$namespace = 'App\\Controllers\\';
$controller_class = $namespace.ucfirst($controller_class).'Controller';

$controller = new $controller_class();
$ret = $controller->$method();

if (is_object($ret) && $ret instanceof Response) {
    $ret->send();
    exit(0);
}
