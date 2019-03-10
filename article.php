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
 * @var array $data Массив объекта со статьей
 */
$data = Article::findById($articleId);

/**
 * @var object $news Объект со статьей
 */
$news = array_pop($data);
include __DIR__ . '/App/Views/article/article.php';
