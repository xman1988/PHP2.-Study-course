<?php
use App\Models\Article;

require_once __DIR__ . '/autoload.php';

/**
 *
 * @var array|false $data Содержит массив объектов статей из БД,
 * либо двумерный массив статей из БД,
 * либо false в случае ошибки
 *
 */
$data = Article::findAll();

//Передаём $data в представление
include __DIR__ . '/App/Views/admin/admin.php';