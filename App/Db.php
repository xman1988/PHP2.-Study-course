<?php

namespace app;

use App\Config;

/**
* Класс работы с БД
*/
class Db
{
	/**
	 * @var object PDO $dbh Объект подключения к БД
	 */
	protected $dbh;

	/**
	 * Создает подключение к БД
	 */
	public function __construct()
	{
		$config = Config::instance();
		$host = $config->data['db']['host'];
		$dbName = $config->data['db']['dbName'];
		$user = $config->data['db']['user'];
		$password = $config->data['db']['password'];
		$this->dbh = new \PDO('mysql:host=' . $host . ';dbname=' . $dbName, $user, $password);
	}

	/**
	 * Метод отправки подготовленного запроса вида SELECT в БД
	 *
	 * @param string $sql Текст sql запроса
	 * @param array $params Массив параметров подстановки в подготовленный запрос
	 * @param string $class Название класса, объекты которого необходимо получить после работы данного метода
	 *
	 * @return array|false Возвращает массив объектов со статьями переданного названия класса в параметр $class,
	 * если название класса не передано, то возвращает массив статей,
	 * либо false в случае ошибки
	 */
	public function query($sql, $params = [], $class = null)
	{
		$sth = $this->dbh->prepare($sql);
		$sthResult = $sth->execute($params);

		if (false === $sthResult) {
			return false;
		}

		// Если класс возвращаемых из БД объектов не передан, то метод возвращает массив со статьями
		if (null === $class) {
			return $sth->fetchAll(\PDO::FETCH_ASSOC);
		} else {
			return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
		}
	}

	/**
	 * Метод отправки подготовленного запроса вида INSERT, UPDATE, DELETE в БД
	 *
	 * @param string $query Текст sql запроса
	 * @param array $params Массив параметров подстановки в подготовленный запрос
	 *
	 * @return boolean Возвращает соответственно true/false в случае успешного/неуспешного запроса к БД
	 */
	public function execute($query, $params = [])
	{
		return $this->dbh->prepare($query)->execute($params);
	}

	/**
	 * Метод возвращает id последней измененной записи
	 *
	 * @return string|null Возвращает номер id последней измененной записи, либо NULL в случае неудачи
	 */
	public function lastInsertId()
	{
		return $this->dbh->lastInsertId();
	}
}
