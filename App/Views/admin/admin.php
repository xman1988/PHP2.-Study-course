<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="/css/admin.css">
	<title>Таблица новостей</title>
</head>
<body>
<div class="colorWrap">
	<header>
		<a class="button1 headerLeft" href="/index.php">Главная страница</a>
		<a class="button2 headerRight" href="/admin/articleCreate.php">Создать статью</a>
	</header>
	<div class='main-block'>
		<div class='articleList'>
			<table>
				<tbody>
				<tr>
					<th>№</th>
					<th>ID</th>
					<th>Название</th>
					<th>Текст</th>
					<th>Действие</th>
				</tr>
				<?php $i = 1; ?>
				<?php foreach ($data as $news): ?>
					<tr>
						<th> <?php echo $i; ?> </th>
						<th> <?php echo $news->id; ?> </th>
						<th> <?php echo $news->title; ?> </th>
						<td><?php echo $news->content; ?></td>
						<th>
							<a class="bot8" href="/admin/articleEditForm.php?id=<?php echo $news->id; ?>">Изменить</a>
							<a class="bot8" href="/admin/articleDelete.php?id=<?php echo $news->id; ?>">Удалить</a>
						</th>
					</tr>
					<?php $i++; ?>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>

