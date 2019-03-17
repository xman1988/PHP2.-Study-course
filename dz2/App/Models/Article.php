<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 06.03.2019
 * Time: 19:58
 */

namespace App\Models;

use app\Model;


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
}
