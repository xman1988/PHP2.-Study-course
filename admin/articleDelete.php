<?php
use App\Models\Article;

require_once __DIR__ . '/../autoload.php';

// Компонент для удаления существующей статьи в БД, реализует ActiveRecord для объекта $article
if (isset($_GET['id'])) {
	$id = (int)htmlspecialchars($_GET['id']);
	$article = Article::findById($id);
	$article->delete($id);
	header('Location: /admin.php');
}
