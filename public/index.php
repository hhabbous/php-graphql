<?php

// set a constant that holds the project's folder path, like "/var/www/html/php_graphql".
// DIRECTORY_SEPARATOR adds a slash to the end of the path
define("ROOT", dirname(__DIR__) . DIRECTORY_SEPARATOR);
// set a constant that holds the project's "application" folder, like "/var/www/html/php-graphql/application".
define("APP", join(DIRECTORY_SEPARATOR, [ROOT . "application"]));
// set a constant that holds the project's "theme" folder.
define("THEME_FOLDER", join(DIRECTORY_SEPARATOR, [ROOT . "application", "frontend", "view"]));

// This is the auto-loader for Composer-dependencies (to load tools into your project).
require_once "../vendor/autoload.php";

// load application class
use PQ\FrontEnd\core\Application;

// start the application
$application = new Application();
