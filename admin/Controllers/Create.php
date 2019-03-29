<?php
namespace admin\Controllers;

use admin\Controller;
use App\Models\Article;
use App\Models\Author;

class Create extends Controller
{
	protected function handle()
	{
		// Компонент обработки формы для создания новой статьи в БД, реализует ActiveRecord для объекта $article
		if (!empty($_POST['title']) and !empty($_POST['content']) and !empty($_POST['author'])) {
			//Записываем нового автора в таблицу authors, получаем ID только что вставленного поля
			$author = new Author();
			$author->name = $_POST['author'];
			$authorID = $author->save();

			//Записываем новую статью в таблицу articles,
			// используя для свойства author_id первичный ключ автора, созданного выше
			$article = new Article();
			$article->title = $_POST['title'];
			$article->content = $_POST['content'];
			$article->author_id = $authorID;
			$article->save();

			header('Location: /admin.php');
		}
	}
}