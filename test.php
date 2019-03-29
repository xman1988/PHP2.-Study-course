<?php
use App\tests\testSQL;
use app\View;

require_once __DIR__ . '/autoload.php';

/**
 * Контроллер тестирования функций и методов проекта
 *
 */
$view = new View();
$test = new testSQL;

/**
 * @var array $result Массив с результатами тестирования вставки нового пользователя в БД
 */
$email = 'test0@test.com';
$password = 'test0';
$result = $test->testInsertUser($email, $password);

$view->testResult = $test->testInsertUser($email, $password);
echo $view->render( __DIR__ . '\App\Views\tests\test.php' );

