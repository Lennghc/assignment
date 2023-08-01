<?php

// Database connection                
define('DB_HOST', 'localhost');
define('DB_NAME', 'opdracht');
define('DB_USER', 'root');
define('DB_PASS', '');

define('PATH_DIR', (pathinfo($_SERVER['PHP_SELF'])['dirname'] != '/' ? pathinfo($_SERVER['PHP_SELF'])['dirname'] : null));
