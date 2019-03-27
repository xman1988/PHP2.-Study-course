<?php

use App\Models\Article;
use App\Models\Author;

require_once __DIR__ . '/../autoload.php';

/**
 *
 * Компонент обработки формы для перезаписи существующей статьи в БД,
 * реализует ActiveRecord для объекта $article.
 * 1) В случае, если не переданы заголовок и текст статьи из формы,
 * загружает объект статьи из БД.
 * 2) В случае, если переданы заголовок и текст статьи из формы,
 * перезаписывает  в БД загруженный ранее объект.
 *
 */
$id = $_GET['id'];

// Выбираем статью из БД по переданному первичному ключу
$article = Article::findById($id);

// Если поле author_id  БД(таблица article) содержит NULL, то присваиваем $authorName значение 'Без автора'
if (null === $article->author_id) {
	$authorName = 'Без автора';
} else {
	// находим поле с именем автора по author_id
	$author = Author::findById($article->author_id);
	$authorName = $author->name;
}

/**
 *
 * Если переданы из формы текст и заголовок статьи,
 * то перезаписываем существующие свойства у объекта $article,
 * и перезаписываем новые свойства в текущее поле БД
 *
 */
if (isset($_POST['title']) and isset($_POST['content'])) {
	$article->title = $_POST['title'];
	$article->content = $_POST['content'];
	$article->save();
	header('Location: /admin.php');
}

// выводим свойства загруженного из БД объекта статьи в поля формы  
include __DIR__ . '/../App/Views/admin/adminEdit.php';

	


