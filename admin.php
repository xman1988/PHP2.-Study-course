<?php
use App\Models\Article;
use app\View;

require_once __DIR__ . '/autoload.php';

$view = new View();

/**
 * @param object|false $view->news Содержит один объект таблицы authors, либо false в случае ошибки
 *
 */
$view->news = Article::getArticles();

// выводим шаблон представления с набором статей на экран клиента
echo $view->render(__DIR__ . '/App/Views/admin/admin.php');
