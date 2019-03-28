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
 * @param array $view->testResult Результат тестирования вставки нового пользователя в БД
 */
$email = 'test0@test.com';
$password = 'test0';
$view->testResult = $test->testInsertUser($email, $password);
echo $view->render( __DIR__ . '\App\Views\tests\test.php' );
