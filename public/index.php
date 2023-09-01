<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');


require_once '../autoload.php';
require_once '../app/routes/api.php';
require_once '../app/routes/web.php';
require_once '../bootstrap/app.php';

use Core\Route;
$request = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

Route::dispatch($requestMethod, $request);