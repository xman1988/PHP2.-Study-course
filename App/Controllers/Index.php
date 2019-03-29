<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;

class Index extends Controller
{
	protected function handle()
	{
// запрашиваем все статьи с их авторами из БД
		$this->view->news = Article::getArticles();

// выводим шаблон представления с набором статей на экран клиента
		echo $this->view->render(__DIR__ . '/../Views/index/index.php');
	}
}