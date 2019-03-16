<?php

namespace App\Models;

use app\Db;
use app\Model;

/**
 * Модель работы с пользователем
 *
 */
class User extends Model
{
	/**
	 * @var string $table Название таблицы с которой работает класс
	 */
	protected static $table = 'users';

	/**
	 * @var string $email E-mail пользователя
	 */
	public $email;

	/**
	 * @var string $password Пароль пользователя
	 */
	public $password;

	/**
	 * Метод записи нового пользователя в БД
	 *
	 * @param string $email E-mail пользователя
	 * @param string $password Пароль пользователя
	 *
	 * @return string|false|array Возвращает номер строки вставленного поля,
	 * либо false в случае ошибки,
	 * либо в случае ошибки валидации данных - массив с текстом ошибки
	 */
	public function createUser($email, $password)
	{
		$this->email = $email;
		$this->password = $password;

		// Валидируем e-mail
		$validateEmailResult = self::emailValidate($this->email);
		if ($validateEmailResult === false) {
			$errorMessage = [];
			$errorMessage['Error'] = 'E-mail не прошел валидацию';
			return $errorMessage;
		}
		$db = new Db();
		$sql = 'INSERT INTO users (email, password) VALUES (:email, :password)';
		$resultInsert = $db->execute($sql, [':email' => $this->email, ':password' => $this->password]);
		if ($resultInsert !== false) {
			return $db->lastInsertId();
		}
		return false;
	}

	/**
	 * Метод проверки E-mail
	 *
	 * @param string $email
	 *
	 * @return string|false Возвращает проверенный e-mail,
	 * либо false в случае если e-mail проверку не прошёл
	 *
	 */
	public static function emailValidate($email)
	{
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}
}
