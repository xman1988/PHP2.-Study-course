<?php
use App\Models\Article;

require_once __DIR__ . '/autoload.php';

$articleCount = 3;
$data = Article::findLast($articleCount);
include __DIR__ . '/App/Views/index/index.php';
