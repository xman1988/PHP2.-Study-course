<?php
require_once __DIR__ . '/autoload.php';

use App\Models\Article;

if(isset($_GET['id'])){
	$articleId = (int)htmlspecialchars($_GET['id']);
}
$data = Article::findById($articleId);
$news = array_pop($data);
include __DIR__ . '/App/Views/article/article.php';
?>
