<?php

use App\Models\Article;

require_once __DIR__ . '/../autoload.php';

/**
 *
 * Компонент обработки формы для перезаписи существующей статьи в БД,
 * реализует ActiveRecord для объекта $article.
 *
 */
$id = $_GET['id'];

// Выбираем статью из БД по переданному первичному ключу
$article = Article::findById($id);

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

	


