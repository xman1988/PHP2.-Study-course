<?php
namespace admin\Controllers;

use admin\Controller;
use App\Models\Article;

class Delete extends Controller
{
	protected function handle()
	{
		// Компонент для удаления существующей статьи в БД, реализует ActiveRecord для объекта $article
		if (isset($_GET['id'])) {
			$id = (int)htmlspecialchars($_GET['id']);
			$article = Article::findById($id);
			$article->delete($id);
			
			header('Location: /admin.php');
		}
	}
}