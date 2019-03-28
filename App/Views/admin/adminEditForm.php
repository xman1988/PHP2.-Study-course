<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="/css/adminEdit.css">
	<title>Таблица новостей</title>
</head>
<body>
<div class="colorWrap">
	<header>
		<a class="button1 headerLeft" href="/admin.php">Админ-панель</a>
	</header>
	<h1>Редактировать статью</h1>
	<div class="container">

		<form name="createArticle" method="post" action="/admin/articleEdit.php?id=<?php echo $article->id; ?>">
			<div class="row">
				<label for="fname">Id статьи № <?php echo $article->id; ?></label>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="fname">Название статьи </label>
				</div>
				<div class="col-75">
					<input type="text" id="fname" name="title" value="<?php echo $article->title; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="subject">Текст статьи</label>
				</div>
				<div class="col-75">
					<textarea id="subject" name="content"><?php echo $article->content; ?></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="fname">Автор статьи: </label>
				</div>
				<div class="col-75">
					<label for="fname"> <?php echo $authorName; ?></label>
				</div>

			</div>
			<div class="row">
				<input type="submit" value="Сохранить">
				<input type="reset" value="Очистить">
			</div>
		</form>
	</div>
</div>
</body>
</html>

