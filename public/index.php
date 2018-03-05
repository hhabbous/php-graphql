<?php

define("ROOT", dirname(__DIR__) . DIRECTORY_SEPARATOR);
define("APP", ROOT . "application" . DIRECTORY_SEPARATOR);


require_once "../vendor/autoload.php";

use Application\FrontEnd\core\Application;

$application = new Application();
