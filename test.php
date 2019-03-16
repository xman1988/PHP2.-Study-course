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
$result = $test->testInsertUser();

// Метод вывода результата тестирования на страницу
$test->render($result);
