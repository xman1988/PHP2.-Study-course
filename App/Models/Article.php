<?php

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

	/**
	 * Метод получает из БД массив статей, добавляет в массив имена авторов статей 
	 * и возвращает массив со статьями и их авторами
	 *
	 * @return array $arr массив со статьями и их авторами
	 */
	public static function getArticles()
	{
		// находим все статьи в БД
		$arr = Article::findAll();
		foreach ($arr as $news){
			
			// если автор статьи указан (т.е. не NULL)
			if(null !== $news->author_id){
				
				// находим поле с именем автора по author_id 
				$author = Author::findById($news->author_id);

				// перезаписываем свойство authorName, где находится ID автора его именем $author->name
				$news->authorName = $author->name;

				// если автор статьи не указан (т.е. NULL)
			}else{
				$news->authorName = 'Автор неизвестен';
			}

			// если findById при запросе к БД вернет false
			if(!$news->authorName){
				$news->authorName  = 'Автор неизвестен';
			}
		}
		return $arr;
	}
}
