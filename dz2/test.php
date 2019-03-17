<?php
use App\tests\testSQL;

require_once __DIR__ . '/autoload.php';

/**
 * Контроллер тестирования функций и методов проекта
 *
 */

$test = new testSQL;

/**
 * @var array $result Массив с результатами тестирования вставки нового пользователя в БД
 */
$email = 'test0@test.com';
$password = 'test0';
$result = $test->testInsertUser($email, $password);

// Метод вывода результата тестирования на страницу
$test->render($result);
