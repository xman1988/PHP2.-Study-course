<?php
require_once __DIR__ . '/autoload.php';

use App\Models\Article;

/**
 * Контроллер вывода страницы статьи на экран
 *
 */

// $_GET['id'] Содержит id искомой статьи
if (isset($_GET['id'])) {
	$articleId = (int)htmlspecialchars($_GET['id']);
}

/**
 * @var mixed $data Массив объекта со статьей, либо false в случае ошибки
 */
$data = Article::findById($articleId);

/**
 * @var mixed $news Объект со статьей, либо NULL, если массив пуст
 */
$news = array_pop($data);
include __DIR__ . '/App/Views/article/article.php';
