<?php

use App\Models\Article;

require_once __DIR__ . '/../autoload.php';

/**
 * Компонент выводит в форму данные статьи для редактирования.
 */
$id = $_GET['id'];

// Выбираем статью из БД по переданному первичному ключу
$article = Article::findById($id);

// выводим свойства загруженного из БД объекта статьи в поля формы  
include __DIR__ . '/../App/Views/admin/adminEditForm.php';
