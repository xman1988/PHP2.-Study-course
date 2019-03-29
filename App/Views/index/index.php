<?php
/**
 * @var \App\View $this
 */
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="/css/index.css">
	<title>Таблица новостей</title>
</head>
<body>
<header>
	<a href="/admin.php" class="button1 aloneButton">Админ-панель</a>
</header>
<section id="cd-timeline" class="cd-container">
	<?php foreach ($this->news as $item): ?>
		<?php
		if ($item->id % 2 == 0):
			$image = 'picture';
		else:
			$image = 'location';
		endif;
		?>
		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-<?php echo $image; ?> ">
				<img src="/img/cd-icon-<?php echo $image; ?>.svg" alt="<?php echo $image; ?>">
			</div>
			<div class="cd-timeline-content">
				<h2> <?php echo $item->title; ?> </h2>
				<p><?php echo $item->content; ?></p>
				<p>Автор статьи : <?php echo $item->authorName; ?></p>
				<a href="/?ctrl=article&id=<?php echo $item->id; ?>" class="cd-read-more">Читать далее</a>
			</div>
		</div>
	<?php endforeach; ?>
</section>
</body>
</html>
