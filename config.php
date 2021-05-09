<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__);

define('DEFAULT_CONTROLLER', 'Home');
define('DEFAULT_METHOD', 'index');
define('DEFAULT_ERROR_CONTROLLER', 'Error');

/* Configuracion de base de datos */

define('DB_HOST', 'localhost');
define('DB_NAME', 'test');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

/* DB Data Source Name */
define('DB_DSN', 'mysql:host='.DB_HOST.';dbname='.DB_NAME);