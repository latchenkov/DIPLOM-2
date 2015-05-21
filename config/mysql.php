<?php

// This is the database connection configuration.
$file_setting = dirname(__FILE__).'/dbsetting.php';

if (!file_exists($file_setting)){
    $dbuser = null; 
    $dbpass = null; 
    $dbhost = null; 
    $dbname = null;
}
else {
    require_once ($file_setting);
}

return [
    'driver'    => 'mysql',
    'host'      => $dbhost,
    'database'  => $dbname,
    'username'  => $dbuser,
    'password'  => $dbpass,
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
    'strict'    => false,
];

