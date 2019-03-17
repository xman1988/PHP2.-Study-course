<?php
use App\Models\Article;

require_once __DIR__ . '/../autoload.php';

// Компонент обработки формы для создания новой статьи в БД, реализует ActiveRecord для объекта $article
if (!empty($_POST['title']) and !empty($_POST['content'])) {
	$article = new Article();
	$article->title = $_POST['title'];
	$article->content = $_POST['content'];
	$article->save();
	header('Location: /admin.php');
}

include __DIR__ . '/../App/Views/admin/adminCreate.php';