<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 06.03.2019
 * Time: 19:58
 */

namespace App\Models;

use app\Model;
use app\Db;

/**
 * Модель работы со статьями
 *
 */
class Article extends Model
{
	/**
	 * @var string $table Название таблицы с которой работает класс
	 */
	protected static $table = 'news';

	/**
	 * @var integer $id Первичный ключ статьи
	 */
	public $id;

	/**
	 * @var string $title Название статьи
	 */
	public $title;

	/**
	 * @var string $content Текст статьи
	 */
	public $content;

	/**
	 * Метод, который возвращает указанное количество статей
	 *
	 * @param integer $limit Число выводимых на страницу статей из БД
	 *
	 * @return mixed Возвращает массив объектов со статьями, либо false в случае ошибки
	 */
	public static function findLast($limit)
	{
		$db = new Db();
		$sql = "SELECT * FROM " . static::$table . " ORDER BY id DESC LIMIT :limit ";
		return $db->query($sql, [':limit' => $limit], static::class);
	}
}
