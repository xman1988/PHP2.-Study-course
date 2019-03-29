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
		<a class="button2 headerRight" href="/admin.php?ctrl=formCreate">Создать статью</a>
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
					<th>Автор</th>
					<th>Действие</th>
				</tr>
				<?php $i = 1; ?>
				<?php foreach ($this->news as $item): ?>
					<tr>
						<th> <?php echo $i; ?> </th>
						<th> <?php echo $item->id; ?> </th>
						<th> <?php echo $item->title; ?> </th>
						<td><?php echo $item->content; ?></td>
						<th> <?php echo $item->authorName; ?> </th>
						<th>
							<a class="bot8" href="/admin.php?ctrl=formEdit&id=<?php echo $item->id; ?>">Изменить</a>
							<a class="bot8" href="/admin.php?ctrl=delete&id=<?php echo $item->id; ?>">Удалить</a>
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

