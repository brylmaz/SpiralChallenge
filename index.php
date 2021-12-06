<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/database.php';
require __DIR__ . '/helper.php';
require __DIR__ . '/Modal.php';
require __DIR__ . '/controller.php';
require __DIR__ . '/route.php';

 

Route::run('/getLayout', 'spiralcontroller@getLayout','post');
Route::run('/getValueOfLayout', 'spiralcontroller@getValueOfLayout','post');

