<?php

namespace App\tests;

use App\Models\User;

/**
 * Класс тестирования методов проекта, работающих с БД
 *
 */
class testSQL
{
	/**
	 * Метод вставки тестовой записи нового пользователя в БД.
	 * Метод вставляет тестовую запись в БД, а затем удаляет ее.
	 *
	 * @param string $email Почта пользователя
	 * @param string $password Пароль пользователя
	 *
	 * @return array Возвращает массив сообщений об успешной или неудачной работе
	 * методов добавления записи нового пользователя в БД.
	 *
	 */
	public function testInsertUser($email = 'test111@test.com', $password = 'test012345')
	{
		$newUser = new User();

		// Создаем новое поле в БД, случае удачного создания пользователя,
		// в $resultInsert записывается номер id первичного ключа созданной записи типа string
		$resultInsert = $newUser->createUser($email, $password);

		$result = [];

		// В случае неудачи записываем ошибки в массив
		if ($resultInsert === false) {
			$result['Error']['insert'] = "Тест на вставку тестового поля в таблицу users прошел НЕУДАЧНО! <br/>
											Попробуйте изменить вставляемые данные для проверки. 
											Некоторые поля могут быть уникальными";
			return $result;
		} elseif (isset($resultInsert['Error'])) {
			$result['Error']['insert'] = "Тест на вставку тестового поля в таблицу users прошел НЕУДАЧНО! <br/>"
				. $resultInsert['Error'];
			return $result;
		}

		// В случае успеха записываем об этом сообщение в массив
		$result['Success']['insert'] = 'Тест на вставку тестового поля c id=' . $resultInsert . ' в таблицу users прошел УСПЕШНО!';

		// В случае успеха удаляем только что созданное поле в БД
		$deleteResult = $newUser->delete($resultInsert);
		if ($deleteResult) {
			$result['Success']['deleteTestUser'] = 'Удаление тестового поля c id=' . $resultInsert . ' прошло УСПЕШНО!';
		} else {
			$result['Error']['deleteTestUser'] = 'Что-то пошло не так с удалением тестового поля c id= ' . $resultInsert;
		}

		// Возвращаем массив сообщений
		return $result;
	}

	/**
	 * Метод вывода результата тестирования на страницу
	 *
	 * @param array $result Массив сообщений об успешной или неудачной работе скриптов
	 *
	 * @return void
	 *
	 */
}
