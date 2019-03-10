<?php
use App\Models\Article;

require_once __DIR__ . '/autoload.php';

/**
 * Единая точка входа для сайта
 * @var integer $articleCount Число выводимых на страницу статей из БД
 */
$articleCount = 3;

/**
 * @var array $data Массив объектов со статьями
 */
$data = Article::findLast($articleCount);
include __DIR__ . '/App/Views/index/index.php';
