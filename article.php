<?php

use App\Models\Article;
use App\Models\Author;
use app\View;

require_once __DIR__ . '/autoload.php';


/**
 * Контроллер вывода страницы статьи на экран
 * 
 */

$view = new View();

// $_GET['id'] Содержит id искомой статьи
if (isset($_GET['id'])) {
	$articleId = (int)htmlspecialchars($_GET['id']);
}

/**
 * @param object|false $view->news Содержит один объект со статьей, либо false в случае ошибки
 * 
 */
$view->news = Article::findById($articleId);

/**
 * @param  object|false $view->author Содержит один объект таблицы authors, либо false в случае ошибки
 * 
 */
$view->author = Author::findById($view->news->author_id);

echo $view->render( __DIR__ . '/App/Views/article/article.php' );
