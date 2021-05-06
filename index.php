<?php
use App\Autoloader;
use App\Core\Main;

require_once 'autoloader.php';

# on appel notre autoloader
Autoloader::register();
session_start();

/**
 * On instancie notre routeur
 */

$app = new Main();
$app->start();