<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="/css/adminCreate.css">
	<title>Таблица новостей</title>
</head>
<body>
<div class="colorWrap">
	<header>
		<a class="button1 headerLeft" href="/admin.php">Админ-панель</a>
	</header>
	<h1>Создать статью</h1>
	<div class="container">

		<form name="createArticle" method="post" action="/admin/admin_create.php">
			<div class="row">
				<div class="col-25">
					<label for="fname">Название статьи</label>
				</div>
				<div class="col-75">
					<input type="text" id="fname" name="title" placeholder="Напишите название новой статьи">
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="subject">Текст статьи</label>
				</div>
				<div class="col-75">
					<textarea id="subject" name="content" placeholder="Напишите текст"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="fname">Автор</label>
				</div>
				<div class="col-75">
					<input type="text" id="fname" name="author" placeholder="Напишите имя автора">
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

