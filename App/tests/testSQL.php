<?php

namespace App\tests;

use app\Db;

class testSQL
{
	public $email = 'test1@test.com';
	public $password = 'test0124';

	public function testInsertUser()
	{

		$dbObject = new Db();
		$insertQuery = 'INSERT INTO users (email, password)
			  VALUES (:email, :password)';
		$resultInsert = $dbObject->execute($insertQuery, [':email' => $this->email, ':password' => $this->password]);
		if (isset($resultInsert['Error'])) {
			$result['Error']['emailValidation'] = $resultInsert['Error'];
		}
		if (true === $resultInsert) {
			{
				$lastInsertId = $dbObject->lastInsertString();
				$result['Success']['text'] = 'Тест на вставку тестового поля c id=' . $lastInsertId . ' в таблицу users прошел УСПЕШНО!';
				$result['Success']['sql'] = 'Текст sql запроса вставки тестового поля: ' . $insertQuery;
			}
			{
				$deleteSql = "DELETE FROM users WHERE id = $lastInsertId";
				$resultDelete = $dbObject->execute($deleteSql);
				$lastInsertIdAfterTest = $dbObject->lastInsertString();
				if ($lastInsertIdAfterTest === $lastInsertId) {
					$result['Error']['deleteTestField'] = 'Что-то пошло не так с удалением тестового поля  ' . $lastInsertIdAfterTest;
				} elseif ($lastInsertIdAfterTest !== $lastInsertId) {
					$result['Success']['deleteTestField'] = 'Удаление тестового поля c id=' . $lastInsertId . ' прошло УСПЕШНО!';
				}
			}

		} else {
			$result['Error']['insert'] = "Тест на вставку тестового поля в таблицу users прошел НЕУДАЧНО! <br/>
			Попробуйте изменить вставляемые данные для проверки. Некоторые поля могут быть уникальными";
		}
		self::render($result);
	}

	public static function render($result = [])
	{
		require __DIR__ . '\..\Views\tests\test.php';
	}
}
