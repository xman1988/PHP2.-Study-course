<?php
use App\tests\testSQL;

require_once __DIR__ . '/autoload.php';

$test = new testSQL();
$test->testInsertUser();
