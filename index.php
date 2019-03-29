<?php
require_once __DIR__ . '/autoload.php';

$ctrlName = isset($_GET['ctrl']) ? ucfirst($_GET['ctrl']) :'Index';
$ctrlClass = '\App\Controllers\\' . $ctrlName;
$ctrl = new $ctrlClass;
$ctrl->action();




