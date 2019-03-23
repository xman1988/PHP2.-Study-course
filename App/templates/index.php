<?php
/**
 * @var \App\View $news
 */ 
?>
<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>PHP-2</title>
</head>
<body>
<h1>Новости</h1>

<?php foreach ($news as $article): ?>

<article>
	<h3><?php echo $news->title; ?></h3>
	<div><?php echo $news->content; ?></div>
</article>

<?php endforeach; ?>

</body>
</html>