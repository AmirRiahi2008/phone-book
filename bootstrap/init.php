<?php
use App\Core\Request;
use App\Core\Router\Router;
define("BASE_PATH", __DIR__ . "/../");
include BASE_PATH . "helpers/helper.php";
include BASE_PATH . "vendor/autoload.php";
include BASE_PATH . "routes/web.php";

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();
$request = new Request();
$router = new Router($request);