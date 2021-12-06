<?php

error_reporting(0);



require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/database.php';
require __DIR__ . '/helper.php';
require __DIR__ . '/Modal.php';
require __DIR__ . '/controller.php';
require __DIR__ . '/route.php';

 

Route::run('/getLayout', 'spiralcontroller@getLayout','post');
Route::run('/getValueOfLayout', 'spiralcontroller@getValueOfLayout','post');

