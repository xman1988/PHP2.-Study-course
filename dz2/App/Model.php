<?php

namespace App;

use app\Db;

/**
 * Родительский класс работы моделей
 *
 */
abstract class Model
{
	/**
	 * @var string $table Имя таблицы
	 */
	protected static $table = '';

	/**
	 * @var integer $id Первичный ключ поля
	 */
	public $id;


	/**
	 * Метод возвращает все поля из таблицы
	 *
	 * @return array|false Возвращает массив объектов класса,
	 * если название класса не передано, то возвращает двумерный массив значений,
	 * либо false в случае ошибки
	 */
	public static function findAll()
	{
		$db = new Db();
		$sql = 'SELECT * FROM ' . static::$table;
		return $db->query($sql, [], static::class);
	}


	/**
	 * Метод возвращает одно поля из таблицы
	 *
	 * @return array|false Возвращает массив объектов класса,
	 * если название класса не передано, то возвращает двумерный массив значений,
	 * либо false в случае ошибки
	 */
	public static function findById($id)
	{
		$db = new Db();
		$sql = 'SELECT * FROM ' . static::$table . ' WHERE id = :id';
		$arr = $db->query($sql, [':id' => $id], static::class);
		if ($arr) {
			return array_pop($arr);
		}
		return false;
	}

	/**
	 * Метод, который возвращает указанное количество статей
	 *
	 * @param integer $limit Число выводимых на страницу статей из БД
	 *
	 * @return array|false Возвращает массив объектов со статьями, либо false в случае ошибки
	 */
	public static function findLast($limit)
	{
		$db = new Db();
		$sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $limit;
		return $db->query($sql, [], static::class);
	}

	/**
	 * Создает в БД поле со свойствами объекта $this
	 * и записывает в свойство объекта $this значение первичного ключа id, вставленного поля.
	 *
	 * @return void
	 */
	public function insert()
	{
		$db = new Db();
		$props = get_object_vars($this);
		$fields = [];
		$binds = [];
		$data = [];
		foreach ($props as $name => $value) {
			if ('id' == $name) {
				continue;
			}
			$fields[] = $name;
			$binds[] = ':' . $name;
			$data[':' . $name] = $value;
		}
		$fieldNames = implode(', ', $fields);
		$fieldValues = implode(', ', $binds);
		$sql = 'INSERT INTO ' . static::$table . ' ( ' . $fieldNames . ' ) ' . ' VALUES ' . ' ( ' . $fieldValues . ' )';
		$db->execute($sql, $data);
		$this->id = $db->lastInsertId();
	}

	/**
	 * Перезаписывает в БД поле со свойствами объекта $this
	 *
	 * @return void
	 */
	public function update()
	{
		$db = new Db();
		// получаем список свойств объекта
		$props = get_object_vars($this);
		$params = [];
		$str = '';
		foreach ($props as $name => $value) {
			if ('id' == $name) {
				continue;
			}
			// формируем массив с параметрами подстановки
			$params[':' . $name] = $value;

			//собираем строку для подстановки типа $property = :property
			$str .= $name . '= :' . $name . ', ';
		}

		// убираем из строки последнюю запятую для корректности запроса
		$str = substr($str, 0, -2);
		$sql = 'UPDATE ' . static::$table . ' SET ' . $str .' WHERE id = :id';
		$params[':id'] = $this->id;
		$db->execute($sql, $params);
	}

	/**
	 * Выбирает метод создания или перезаписи поля в БД, в зависимости от наличия свойства id у объекта
	 *
	 * @return void
	 */
	public function save()
	{
		if (empty($this->id)) {
			$this->insert();
		} else {
			$this->update();
		}
	}


	/**
	 * Метод удаления поля из БД
	 *
	 * @param integer $id ID поля для удаления
	 *
	 * @return boolean
	 */
	public static function delete($id):bool
	{
		$db = new Db();
		$sql = 'DELETE FROM ' . static::$table . ' WHERE id = :id';
		return $db->execute($sql, [':id' => $id]);
	}
}
