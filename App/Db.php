<?php

namespace app;

/**
 * Класс работы с БД
 *
 */
class Db
{
	/**
	 * @var object PDO $dbh Объект подключения к БД
	 */
	protected $dbh;

	public function __construct()
	{
		$user = 'root';
		$pass = '';
		$this->dbh = new \PDO('mysql:host=localhost;dbname=php2', $user, $pass);
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
	 * @return mixed Возвращает число id последней измененной записи, либо NULL в случае неудачи
	 */
	public function lastInsertString()
	{
		return $this->dbh->lastInsertId();
	}
}
