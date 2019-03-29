<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article as ArticleModel;
use App\Models\Author;


class Article extends Controller
{
	protected function handle()
	{
		/**
		 * @var object|false $data Содержит один объект со статьей, либо false в случае ошибки
		 */
		$this->view->article = ArticleModel::findById($_GET['id']);
		$this->view->article->author = Author::findById($this->view->article->author_id);

		// выводим шаблон представления с набором статей на экран клиента
		echo $this->view->render(__DIR__ . '/../Views/article/article.php');
	}
}