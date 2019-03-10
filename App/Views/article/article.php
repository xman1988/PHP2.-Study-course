<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href='http://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="/css/reset.css"> 
		<link rel="stylesheet" href="/css/article.css"> 
		<title>Таблица новостей</title>
	</head>
	<body>
		<div id="mainConteiner">
			<section id="cd-timeline" class="cd-container">
				<a href="/index.php" class="cd-read-more">Главная</a>
				<div class="cd-timeline-content">
					<h2> <?php echo $news->title; ?> </h2>
					<p><?php echo $news->content; ?></p>
				</div>
			</section>
		</div>
	</body>
</html>
