<?php

define('URL', '/newz/public/');

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'news');
define('DB_USER', 'root');
define('DB_PASS', '');

define('HASH_SALT', 'wutEVAdaFUQ123');

require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/Model.php';
require_once 'core/View.php';
require_once 'core/Error.php';
require_once 'core/Database.php';
require_once 'core/Session.php';
require_once 'core/Auth.php';
require_once 'core/Hash.php';

?>