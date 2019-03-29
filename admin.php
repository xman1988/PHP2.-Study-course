<?php

require_once __DIR__ . '/autoload.php';

$ctrlName = isset($_GET['ctrl']) ? ucfirst($_GET['ctrl']) :'Index';
$ctrlClass = '\admin\Controllers\\' . $ctrlName;
$ctrl = new $ctrlClass;
$ctrl->action();