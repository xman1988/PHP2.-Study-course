<?php

namespace app;


abstract class Model
{
	protected static $table = '';
	public $id;

	public static function findAll()
	{
		$db = new Db();
		$sql = 'SELECT * FROM '. static::$table;
		return $db->query($sql, [], static::class);
	}
	public static function findById($id){
		$db = new Db();
		$sql = 'SELECT * FROM '. static::$table . ' WHERE id = :id';
		return $db->query($sql, [':id' => $id], static::class);
	}
}