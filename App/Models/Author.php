<?php

namespace App\Models;

use app\Model;


/**
 * Модель работы со статьями
 *
 */
class Author extends Model
{
	/**
	 * @var string $table Название таблицы с которой работает класс
	 */
	protected static $table = 'authors';

	/**
	 * @var integer $id 
	 */
	public $id;

	/**
	 * @var string $name Имя автора
	 */
	public $name;
}
