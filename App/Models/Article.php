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

class Article extends Model
{
	protected static $table = 'news';

	public $id;
	public $title;
	public $content;
	
	public static function findLast($count)
	{
		$db = new Db();
		$sql = "SELECT * FROM " . static::$table . " ORDER BY id DESC LIMIT :count ";
		return $db->query($sql, [':count' => $count], static::class);
	}
	
}