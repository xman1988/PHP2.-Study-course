<?php
use App\Models\Article;

use app\View;

require_once __DIR__ . '/autoload.php';

$view = new View();

// запрашиваем все статьи с их авторами из БД
$view->news = Article::getArticles();

// выводим шаблон представления с набором статей на экран клиента
echo $view->render(__DIR__ . '/App/Views/index/index.php');




