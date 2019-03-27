<?php
use App\Models\Article;
use App\Models\Author;

require_once __DIR__ . '/../autoload.php';

// Компонент обработки формы для создания новой статьи в БД, реализует ActiveRecord для объекта $article
if (!empty($_POST['title']) and !empty($_POST['content']) and !empty($_POST['author'])) {
	$author = new Author();

	// записываем в таблицу authors нового автора
	$author->name = $_POST['author'];

	// $authorID - id последней вставленной записи в БД
	$authorID = $author->save();

	// создаем новую статью и записываем в БД
	$article = new Article();
	$article->title = $_POST['title'];
	$article->content = $_POST['content'];

	// присваиваем $article->author_id значение id($authorID) последней вставленной записи в таблицу authors
	$article->author_id = $authorID;
	$article->save();

	// перенаправляем пользователя после отработки формы
	header('Location: /admin.php');
}

include __DIR__ . '/../App/Views/admin/adminCreate.php';