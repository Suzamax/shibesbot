<?php

use Phalcon\Di\FactoryDefault;
use Phalcon\Autoload\Loader;
use Phalcon\Mvc\Application;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Url;
use Phalcon\Mvc\View;

error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

$loader     = new Loader();
$container  = new FactoryDefault();

$loader->setNamespaces([
    "App"                => APP_PATH . "/",
    "App\Models"         => APP_PATH . "/models/",
    "App\Controllers"    => APP_PATH . "/controllers/",

]);

$loader->register();

$container->set('view', function () {
    $view = new View();
    $view->setViewsDir(APP_PATH . "/views/");
    return $view;
});

$container->set('url', function () {
    $url = new Url();
    $url->setBaseUri('/');
    return $url;
});

$container->set('dispatcher', function () {
    $dispatcher = new Dispatcher();
    $dispatcher->setDefaultNamespace('App\\Controllers');
    return $dispatcher;
});

$app = new Application($container);
try {
    $response = $app->handle($_SERVER["REQUEST_URI"]);
    $response->send();
} catch (\Exception $e) {
    echo 'EXCEPTION: ', $e->getMessage();
}
