<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use app\Maintenance\Maintenance;

define('LARAVEL_START', microtime(true));


if (file_exists(__DIR__.'/../storage/framework/maintenance.php')) {
    Maintenance::handle();
}

require_once __DIR__.'/../vendor/autoload.php';

/** @var Application $app */

$app = new Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

$app->handleRequest(Request::capture());
