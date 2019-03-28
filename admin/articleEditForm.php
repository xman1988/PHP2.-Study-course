<?php

use App\Models\Article;
use App\Models\Author;

require_once __DIR__ . '/../autoload.php';

/**
 * Компонент выводит в форму данные статьи для редактирования.
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

// выводим свойства загруженного из БД объекта статьи в поля формы  
include __DIR__ . '/../App/Views/admin/adminEditForm.php';

	


