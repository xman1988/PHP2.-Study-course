<?php

namespace app;

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
	 * @return mixed Возвращает массив объектов класса,
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
	 * @return object|false $data Содержит один объект со статьей, либо false в случае ошибки
	 */
	public static function findById($id)
	{
		$db = new Db();
		$sql = 'SELECT * FROM ' . static::$table . ' WHERE id = :id';
		$res = $db->query($sql, [':id' => $id], static::class);
		if($res){
			return array_pop($res);
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
	 * Метод удаления поля из БД
	 *
	 * @param integer $id ID поля для удаления
	 *
	 * @return boolean
	 */
	public static function delete($id)
	{
		$db = new Db();
		$sql = 'DELETE FROM ' . static::$table . ' WHERE id = :id';
		return $db->execute($sql, [':id' => $id]);
	}
}
