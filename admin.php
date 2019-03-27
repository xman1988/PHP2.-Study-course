<?php
use App\Models\Article;
use app\View;

require_once __DIR__ . '/autoload.php';

$view = new View();

// запрашиваем все статьи с их авторами из БД
$view->news = Article::getArticles();

//Передаём $data в представление
include __DIR__ . '/App/Views/admin/admin.php';